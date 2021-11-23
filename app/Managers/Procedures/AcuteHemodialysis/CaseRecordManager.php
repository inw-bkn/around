<?php

namespace App\Managers\Procedures\AcuteHemodialysis;

use App\Managers\Resources\AdmissionManager;
use App\Managers\Resources\PatientManager;
use App\Models\CaseRecord;
use App\Models\Note;
use App\Models\NoteType;
use App\Models\Registry;
use App\Models\Resources\Admission;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CaseRecordManager
{
    // index methods
    public function getIndexData()
    {
        // if avatar mode JUST call API
        return [
            'flash' => [
                'page-title' => 'Acute Hemodialysis',
                'main-menu-links' => [
                    ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
                    ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
                    ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
                ],
                'action-menu' => [],
            ],
            'cases' => CaseRecord::whereRegistryId(Registry::findByName('acute_hd')->id)
                                ->with(['patient', 'latestAcuteOrder' => fn ($q) => $q->withAuthorUsername()])
                                ->paginate()
                                ->withQueryString()
                                ->through(fn ($case) => [
                                    'slug' => $case->slug,
                                    'hn' => $case->patient->hn,
                                    'patient_name' => $case->patient->full_name,
                                    'date_dialyze' =>$case->latestAcuteOrder?->date_note?->format('M j'),
                                    'date_reserved' =>$case->latestAcuteOrder?->created_at?->tz(7)?->format('M j'),
                                    'md' => $case->latestAcuteOrder?->author_username,
                                ]),
        ];
    }

    public function getEditData($slug)
    {
        // if avatar mode JUST call API
        if (! $caseRecord = CaseRecord::whereSlug($slug)->first()) {
            abort(404);
        }

        $form = $caseRecord->form;
        if ($form['an']) {
            $form['admission'] = (new AdmissionManager)->manage($caseRecord->form['an'])['admission'];
        } else {
            $form['admission'] = [];
        }
        $form['record']['id'] = $caseRecord->id;
        $form['record']['slug'] = $caseRecord->slug;
        $form['record']['patient_id'] = $caseRecord->patient_id;
        $form['record']['hn'] = $caseRecord->patient->hn;

        return [
            'flash' => [
                'page-title' => 'Acute HD '.$caseRecord->patient->full_name,
                'main-menu-links' => [
                    ['icon' => 'arrow-circle-left', 'label' => 'Back', 'route' => 'procedures.acute-hemodialysis.index', 'can' => true],
                    ['icon' => 'slack-hash', 'label' => 'Case Record', 'route' => '#case-record', 'can' => true],
                    ['icon' => 'slack-hash', 'label' => 'Orders', 'route' => '#orders', 'can' => true],
                    ['icon' => 'slack-hash', 'label' => 'Reservation', 'route' => '#reservation', 'can' => true],
                    ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
                    ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
                    ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
                ],
                'action-menu' => [],
            ],
            'orders' => Note::with(['patient', 'place'])
                    ->whereCaseRecordId($caseRecord->id)
                    ->whereNoteTypeId(NoteType::findByName('acute_hd_order')->id)
                    ->orderby('date_note')
                    ->get()
                    ->transform(function ($note) {
                        return [
                        'slug' => $note->slug,
                        'ward_name' => $note->place->name,
                        'dialysis_type' => $note->form['dialysis_type'],
                        'date_note' => $note->date_note->format('d M Y'),
                        ];
                    }),
            // 'admission' => (new AdmissionManager)->manage($caseRecord->form['an'])['admission'],
            'caseRecordForm' => $form,
            'formConfigs' => $this->getFormConfigs(),
        ];
    }

    public function store($data)
    {
        // if avatar mode JUST call API

        // validate Request::validate(['an' => 'required|exists:admissions']);

        $caseRecord = new CaseRecord();
        $caseRecord->slug = Str::uuid()->toString();
        $search = (new PatientManager)->manage($data['hn']);
        if (! $search['found']) {
            throw new ModelNotFoundException();
        }
        $caseRecord->patient_id = $search['patient']->id;
        $caseRecord->registry_id = Registry::findByName('acute_hd')->id;
        $form = $this->initForm();
        $form['an'] = $data['an'] ?? null;
        $caseRecord->form = $form;
        $caseRecord->creator_id = Auth::user()->id;
        $caseRecord->updater_id = Auth::user()->id;
        $caseRecord->save();

        return $caseRecord;
    }

    public function update($slug, $data)
    {
        // if avatar mode JUST call API

        if (! $caseRecord = CaseRecord::whereSlug($slug)->first()) {
            abort(404);
        }

        $caseRecord->update([
            'form' => $data,
            'updater_id' => Auth::id(),
        ]);

        return ['ok' => true];
    }

    public function setFlash(array $flash)
    {
        request()->session()->flash('page-title', $flash['page-title']);
        request()->session()->flash('main-menu-links', $flash['main-menu-links']);
        request()->session()->flash('action-menu', $flash['action-menu']);
        if ($flash['messages'] ?? null) {
            request()->session()->flash('messages', $flash['messages']);
        }
    }

    protected function getFormConfigs()
    {
        $availableDates = [];
        $today = now()->tz('asia/bangkok');
        $count = 0;
        do {
            if (! $today->isSunday()) {
                $availableDates[] = $today->format('Y-m-d');
            }
            $today->addDay();
            $count++;
        } while ($count <= 7);

        return [
            'availableDates' => $availableDates,
            'disableDates' => [
                // 'January 31, 2021',
                'August 13, 2021',
            ],
            'dialysis_types' => [
                'HD 2 hrs.',
                'HD 3/4 hrs.',
                'HD+HF 4 hrs.',
                'HD+TPE 4 hrs.',
                'HF 2 hrs.',
                'TPE 2 hrs.',
                'SLEDD',
            ],
            // 'wards' => ['ไตเทียม', 'ICU 3', 'ICU 7', 'CCU', 'ICCU', 'ICU ตั้งตรงจิต', 'ICU สลาด สำอางค์', 'ICU สยามมินทร์', 'ICU ประสาทศัลยศาสตร์', 'ICU ศูนย์โรคหัวใจชั้น 5', 'ICU premium', 'ICU อุบัติเหตุ', 'Burn unit', 'RCU'],
            'renal_diagnosis_aki' => [
                ['name' => 'sepsis', 'label' => 'Sepsis'],
                ['name' => 'chf', 'label' => 'CHF'],
                ['name' => 'acs', 'label' => 'ACS'],
                ['name' => 'other_cardiac_cause', 'label' => 'Other cardiac cause'],
                ['name' => 'glomerulonephritis', 'label' => 'Glomerulonephritis'],
                ['name' => 'acute_interstitial_nephritis', 'label' => 'Acute interstitial nephritis'],
                ['name' => 'contrast_induced_nephropathy', 'label' => 'Contrast induced nephropathy'],
                ['name' => 'acute_tubular_necrosis', 'label' => 'Acute tubular necrosis'],
                ['name' => 'drug_induced_aki', 'label' => 'Drug induced AKI'],
            ],
            'renal_diagnosis_ckd' => [
                ['name' => 'dn', 'label' => 'DN'],
                ['name' => 'ht', 'label' => 'HT'],
                ['name' => 'glomerular_disease', 'label' => 'Glomerular disease'],
                ['name' => 'chronic_tubulointerstitial_nephritis', 'label' => 'Chronic tubulointerstitial nephritis'],
            ],
            'comorbidities' => [
                ['name' => 'DM', 'label' => 'DM'],
                ['name' => 'HT', 'label' => 'HT'],
                ['name' => 'DLP', 'label' => 'DLP'],
                ['name' => 'coronary_artery_disease', 'label' => 'Coronary artery disease'],
                ['name' => 'cerebrovascular_disease', 'label' => 'Cerebrovascular disease'],
                ['name' => 'COPD', 'label' => 'COPD'],
                ['name' => 'cirrhosis', 'label' => 'Cirrhosis'],
                ['name' => 'cancer', 'label' => 'Cancer'],
            ],
            'indications' => [
                ['name' => 'volume_overload', 'label' => 'Volume overload'],
                ['name' => 'metabolic_acidosis', 'label' => 'Metabolic acidosis'],
                ['name' => 'hyperkalemia', 'label' => 'Hyperkalemia'],
                ['name' => 'toxin_removal', 'label' => 'Toxin removal'],
                ['name' => 'initiate_HD', 'label' => 'Initiate HD'],
                ['name' => 'maintain_HD', 'label' => 'Maintain HD'],
                ['name' => 'change_from_PD', 'label' => 'Change from PD'],
            ],
            'insurances' => ['เบิกจ่ายตรง', 'ประกันสังคม', '30 บาท'],
        ];
    }

    protected function initForm()
    {
        return [
            'an' => null,
            'ward_discharge' => null,
            'previous_crrt' => false,
            'date_start_crrt' => null,
            'date_end_crrt' => null,
            'admission_diagnosis' => null,
            'renal_diagnosis_aki' => [
                'check' => false,
                'sepsis' => false,
                'chf' => false,
                'acs' => false,
                'other_cardiac_cause' => false,
                'glomerulonephritis' => false,
                'acute_interstitial_nephritis' => false,
                'contrast_induced_nephropathy' => false,
                'acute_tubular_necrosis' => false,
                'drug_induced_aki' => false,
                'other' => null,
            ],
            'renal_diagnosis_ckd' => [
                'check' => false,
                'dn' => false,
                'ht' => false,
                'glomerular_disease' => false,
                'chronic_tubulointerstitial_nephritis' => false,
                'other' => null,
            ],
            'comorbidities' => [
                'dm' => false,
                'ht' => false,
                'dlp' => false,
                'coronary_artery_disease' => false,
                'cerebrovascular_disease' => false,
                'copd' => false,
                'cirrhosis' => false,
                'cancer' => false,
                'other' => null,
            ],
            'indications' => [
                'volume_overload' => false,
                'metabolic_acidosis' => false,
                'hyperkalemia' => false,
                'toxin_removal' => false,
                'initiate_hd' => false,
                'maintain_hd' => false,
                'change_from_pd' => false,
                'other' => null,
            ],
            'hbs_ag' => null,
            'date_hbs_ag' => null,
            'anti_hcv' => null,
            'date_anti_hcv' => null,
            'anti_hiv' => null,
            'date_anti_hiv' => null,
            'consent_signed' => false,
            'insurance' => null,
            'renal_outcome' => null,
            'cr_before_discharge' => null,
            'patient_outcome' => null,
            'cause_of_dead' => null,
        ];
    }
}

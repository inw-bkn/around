<?php

namespace App\Managers\Procedures\AcuteHemodialysis;

use App\Models\Note;
use App\Models\NoteType;
use App\Models\Registry;
use App\Models\Resources\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderManager
{
    public function getEditData($slug)
    {
        $note = Note::whereSlug($slug)->first();

        $form = $note->form;
        $form['reservation'] = [
            'hn' => $note->patient->hn,
            'an' => $note->caseRecord->form['an'],
            'dialysis_at' => $note->place_name,
        ];
        $form['record'] = [
            'slug' => $note->slug,
        ];

        return [
            'orderForm' => $form,
            'flash' => [
                'page-title' => 'Acute HD Order '.$note->patient->profile['first_name'].' @ '.$note->date_note->format('d M Y'),
                'main-menu-links' => [
                    ['icon' => 'arrow-circle-left', 'label' => 'Back', 'route' => route('procedures.acute-hemodialysis.edit', $note->caseRecord->slug), 'can' => true],
                    ['icon' => 'patient', 'label' => 'Patients', 'route' => 'patients', 'can' => true],
                    ['icon' => 'clinic', 'label' => 'Clinics', 'route' => 'clinics', 'can' => true],
                    ['icon' => 'procedure', 'label' => 'Procedures', 'route' => 'procedures', 'can' => true],
                ],
                'action-menu' => [],
            ],
            'formConfigs' => $this->getFormConfigs(),
        ];
    }

    public function store($data)
    {
        // if avatar mode JUST call API

        // validate ward exist in wards
        $noteType = NoteType::findbyName('acute_hd_order');
        $registry = Registry::findbyName('acute_hd');
        $ward = Ward::findbyName($data['dialysis_at']);

        $note = new Note();
        $note->slug = Str::uuid()->toString();
        $note->note_type_id = $noteType->id;
        $note->registry_id = $registry->id;
        $note->case_record_id = $data['case_record_id'];
        $note->patient_id = $data['patient_id'];
        $note->date_note = $data['date_note'];
        $form = $this->initForm($data['dialysis_type']);
        $form['dialysis_type'] = $data['dialysis_type'];
        $note->form = $form;
        $note->user_id = Auth::id();
        $note->save();

        $ward->notes()->save($note);

        return $note;
    }

    public function update($slug, $data)
    {
        // if avatar mode JUST call API

        if (! $note = Note::whereSlug($slug)->first()) {
            abort(404);
        }

        $note->update([
            'form' => $data,
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
        return [
            'access_types' => ['DLC', 'Perm cath', 'AVF', 'AVG'],
            'av_access_sites' => ['Rt arm', 'Lt arm', 'Rt leg', 'Lt leg'],
            'non_av_access_sites' => ['Rt IJV', 'Lt IJV', 'Rt Femoral vain', 'Lt Femoral vain', 'Rt SCV', 'Lt SCV'],
            'dialyzers' => ['SF130E', 'SF150E', 'SF170E', 'SF190E', 'Rexeed 13L', 'Rexeed 15L', 'Rexeed 18L', 'FB170U', 'FB190U', 'FB210U', 'HF80S'],
            'dialysates' => [
                'None => Ca 0, K 0, Mg 0, glucose 0',
                'Ca 3.5, K 2, Mg 1, glucose 100 => AA 101',
                'Ca 2.0, K 2, Mg 1, glucose 100 => AA 201',
                'Ca 2.5, K 2, Mg 1, glucose 100 => AA 251',
                'Ca 3.0, K 2, Mg 1, glucose 100 => AA 301',
                'Ca 3.5, K 3, Mg 1, glucose 100 => AA 101 K3',
                'Ca 2.0, K 3, Mg 1, glucose 100 => AA 201 K3',
                'Ca 2.5, K 3, Mg 1, glucose 100 => AA 251 K3',
                'Ca 3.0, K 3, Mg 1, glucose 100 => AA 301 K3',
                'Ca 3.5, K 2, Mg 0.7, glucose 100 => AA 101',
                'Ca 2.0, K 2, Mg 0.7, glucose 100 => AA 201',
                'Ca 2.5, K 2, Mg 0.7, glucose 100 => AA 251',
                'Ca 3.0, K 2, Mg 0.7, glucose 100 => AA 301',
                'Ca 3.5, K 3, Mg 0.7, glucose 100 => AA 101 K3',
                'Ca 2.0, K 3, Mg 0.7, glucose 100 => AA 201 K3',
                'Ca 2.5, K 3, Mg 0.7, glucose 100 => AA 251 K3',
                'Ca 3.0, K 3, Mg 0.7, glucose 100 => AA 301 K3',
            ],
            'anticoagulants' => [
                ['value' => 'None', 'label' => 'None'],
                ['value' => 'Heparin', 'label' => 'Heparin'],
                ['value' => 'Enoxaparin', 'label' => 'Enoxaparin (Clexane®, Levenox®)'],
                ['value' => 'Fondaparinux', 'label' => 'Fondaparinux'],
                ['value' => 'Tinzaparin', 'label' => 'Tinzaparin (Innohep)'],
                ['value' => 'Other', 'label' => 'Other'],
            ],
            'iv_gluclose_options' => [
                ['value' => 1, 'label' => 'At 1 hour'],
                ['value' => 2, 'label' => 'At 2 hour'],
                ['value' => 3, 'label' => 'At 3 hour'],
                ['value' => 4, 'label' => 'At 4 hour'],
            ],
            'o2_rx_options' => [
                'None',
                'O2 canula',
                'O2 mask with bag',
                'Nasal high flow',
                'NIV',
                'Ventilator',
            ],
            'monitors' => [
                ['name' => 'ekg', 'label' => 'EKG'],
                ['name' => 'observe_chest_pain', 'label' => 'Observe chest pain'],
                ['name' => 'observe_neuro_sign', 'label' => 'Observe neuro sign'],
                ['name' => 'bp_map_greater_than_65mmhg', 'label' => 'BP MAP > 65 mmHg'],
            ],
            'ekgOptions' => ['No', 'Monitoring'],
            'lab_sets' => [
                ['name' => '', 'labs' => ['CBC', 'Hct', 'BUN', 'Cr']],
                ['name' => 'Electrolyte', 'labs' => ['Na', 'K', 'Cl', 'HCO3']],
                ['name' => '', 'labs' => ['Total calcium', 'Phosphate', 'iPTH']],
                ['name' => 'LFT', 'labs' => ['Alb', 'Glob', 'TB', 'DB', 'AST', 'ALT', 'ALP', 'GGT']],
                ['name' => 'Coagulogram', 'labs' => ['PT', 'INR', 'APTT', 'APTT ratio', 'Anti Xa']],
                ['name' => '', 'labs' => ['Iron study', 'Ferritin']],
            ],
            'validators' => [
                ['name' => 'heparin_loading_dose', 'min' => 250, 'max' => 2000, 'type' => 'integer'],
                ['name' => 'heparin_maintenance_dose', 'min' => 0, 'max' => 1500, 'type' => 'integer'],
                ['name' => 'enoxaparin_dose', 'min' => 0.3, 'max' => 0.8, 'type' => 'float'],
                ['name' => 'tinzaparin_dose', 'min' => 1500, 'max' => 3500, 'type' => 'interger'],
                ['name' => 'ultrafiltration', 'min' => 0, 'max' => 4000, 'type' => 'interger'],
                ['name' => 'ultrafiltration_hf', 'min' => 0, 'max' => 4000, 'type' => 'interger'],
                ['name' => 'glucose_50_percent_iv_volume', 'min' => 50, 'max' => 100, 'type' => 'interger'],
            ],
        ];
    }

    protected function initForm($dialysisType)
    {
        $form = [
            'patient_type' => null,
            'dialysis_type' => $dialysisType,
            'inotrope' => null,
            'o2_rx' => null,
            'monitor' => [
                'ekg' => false,
                'observe_chest_pain' => false,
                'observe_neuro_sign' => false,
                'bp_map_greater_than_65mmhg' => false,
                'other' => null,
            ],
            'special_order' => null,
            'labs' => [
                'cbc' => false,
                'hct' => false,
                'bun' => false,
                'cr' => false,
                'na' => false,
                'k' => false,
                'cl' => false,
                'hco3' => false,
                'total_calcium' => false,
                'phosphate' => false,
                'ipth' => false,
                'alb' => false,
                'glob' => false,
                'tb' => false,
                'db' => false,
                'ast' => false,
                'alt' => false,
                'alp' => false,
                'ggt' => false,
                'pt' => false,
                'inr' => false,
                'aptt' => false,
                'aptt_ratio' => false,
                'anti_xa' => false,
                'iron_study' => false,
                'ferritin' => false,
                'crossmatch' => null,
                'other' => null,
            ],
            'pre_treatments' => null,
            'post_treatments' => [
                'heparin' => null,
                'heparin_dose' => null,
                'citrate' => null,
                'citrate_dose' => null,
                'antibiotic' => null,
                'antibiotic_dose' => null,
                'esa' => null,
                'esa_dose' => null,
                'iron_iv' => null,
                'iron_iv_dose' => null,
            ],
        ];

        $hd = [
            'access_type' => null,
            'access_site_coagulant' => null,
            'dialyzer' => null,
            'dialysate' => null,
            'dialysate_flow' => null,
            'reverse_flow' => null,
            'blood_flow' => null,
            'dialysate_temperature' => null,
            'anticoagulant' => null,
            'anticoagulant_none_drip_via_peripheral_iv' => false,
            'anticoagulant_none_nss_200ml_flush_q_hour' => false,
            'heparin_loading_dose' => null,
            'heparin_maintenance_dose' => null,
            'enoxaparin_dose' => null,
            'fondaparinux_bolus_dose' => null,
            'tinzaparin_dose' => null,
            'anticoagulant_other' => null,
            'ultrafiltration' => null,
            'dry_weight' => null,
            'glucose_50_percent_iv_volume' => null,
            'glucose_50_percent_iv_at' => null,
            'albumin_20_percent_prime_100ml' => null,
            'nutrition_iv_type' => null,
            'nutrition_iv_volume' => null,
            'prc_volume' => null,
            'ffp_volume' => null,
            'platelet_volume' => null,
            'transfusion_other' => null,
        ];

        $hf = [
            'access_type' => null,
            'access_site_coagulant' => null,
            'blood_flow' => null,
            'anticoagulant' => null,
            'anticoagulant_none_drip_via_peripheral_iv' => false,
            'anticoagulant_none_nss_200ml_flush_q_hour' => false,
            'heparin_loading_dose' => null,
            'heparin_maintenance_dose' => null,
            'enoxaparin_dose' => null,
            'fondaparinux_bolus_dose' => null,
            'tinzaparin_dose' => null,
            'anticoagulant_other' => null,
            'ultrafiltration' => null,
            'dry_weight' => null,
            'glucose_50_percent_iv_volume' => null,
            'glucose_50_percent_iv_at' => null,
            'albumin_20_percent_prime_100ml' => null,
            'nutrition_iv_type' => null,
            'nutrition_iv_volume' => null,
            'prc_volume' => null,
            'ffp_volume' => null,
            'platelet_volume' => null,
            'transfusion_other' => null,
        ];

        $tpe = [
            'access_type' => null,
            'access_site_coagulant' => null,
        ];

        $sledd = [
            'duration' => null,
            'access_type' => null,
            'access_site_coagulant' => null,
            'dialyzer' => null,
            'dialysate' => null,
            'dialysate_flow' => null,
            'reverse_flow' => null,
            'blood_flow' => null,
            'dialysate_temperature' => null,
            'anticoagulant' => null,
            'anticoagulant_none_drip_via_peripheral_iv' => false,
            'anticoagulant_none_nss_200ml_flush_q_hour' => false,
            'heparin_loading_dose' => null,
            'heparin_maintenance_dose' => null,
            'enoxaparin_dose' => null,
            'fondaparinux_bolus_dose' => null,
            'tinzaparin_dose' => null,
            'anticoagulant_other' => null,
            'ultrafiltration' => null,
            'dry_weight' => null,
            'glucose_50_percent_iv_volume' => null,
            'glucose_50_percent_iv_at' => null,
            'albumin_20_percent_prime_100ml' => null,
            'nutrition_iv_type' => null,
            'nutrition_iv_volume' => null,
            'prc_volume' => null,
            'ffp_volume' => null,
            'platelet_volume' => null,
            'transfusion_other' => null,
        ];

        $dialysisType = Str::of($dialysisType);

        if ($dialysisType->contains('HD+HF')) {
            $form['hd'] = $hd;
            $form['hd']['hf']['with_hf'] = true;
        } elseif ($dialysisType->contains('HD+TPE')) {
            $form['hd'] = $hd;
            $form['tpe'] = $tpe;
        } elseif ($dialysisType->contains('HD ')) {
            $form['hd'] = $hd;
        } elseif ($dialysisType->contains('HF ')) {
            $form['hf'] = $hf;
        } elseif ($dialysisType->contains('TPE ')) {
            $form['tpe'] = $tpe;
        } elseif ($dialysisType->contains('SLEDD')) {
            $form['sledd'] = $sledd;
        }

        return $form;
    }
}

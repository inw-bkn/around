<?php

namespace App\Managers\Procedures\AcuteHemodialysis;

use App\Models\Note;
use App\Models\NoteType;
use App\Models\Registry;
use App\Models\Resources\AttendingStaff;
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
        $staff = AttendingStaff::findbyName($data['attending_staff']);

        $note = new Note();
        $note->slug = Str::uuid()->toString();
        $note->note_type_id = $noteType->id;
        $note->registry_id = $registry->id;
        $note->attending_staff_id = $staff->id;
        $note->case_record_id = $data['case_record_id'];
        $note->patient_id = $data['patient_id'];
        $note->date_note = $data['date_note'];
        $form = $this->initForm($data['dialysis_type']);
        $form['dialysis_type'] = $data['dialysis_type'];
        $form['patient_type'] = $data['patient_type'];
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
            'access_types' => ['DLC', 'Perm cath', 'AVF', 'AVG', 'รอใส่สาย'],
            'av_access_sites' => ['Rt arm', 'Lt arm', 'Rt leg', 'Lt leg'],
            'non_av_access_sites' => ['Rt IJV', 'Lt IJV', 'Rt Femoral vain', 'Lt Femoral vain', 'Rt SCV', 'Lt SCV'],
            'dialyzers' => ['SF130E', 'SF150E', 'SF170E', 'SF190E', 'Rexeed 13L', 'Rexeed 15L', 'Rexeed 18L', 'FB170U', 'FB190U', 'FB210U', 'HF80S'],
            'hf_dialyzers' => ['SF130E', 'SF150E', 'Rexeed 13L', 'Rexeed 15L'],
            'dialysates' => [
                'None => K 0, Ca 0, Mg 0',
                'K 3, Ca 3.5, Mg 1 => AA 101 K3',
                'K 3, Ca 2.0, Mg 1 => AA 201 K3',
                'K 3, Ca 2.5, Mg 1 => AA 251 K3',
                'K 3, Ca 3.0, Mg 1 => AA 301 K3',
                'K 2, Ca 3.5, Mg 1 => AA 101',
                'K 2, Ca 2.0, Mg 1 => AA 201',
                'K 2, Ca 2.5, Mg 1 => AA 251',
                'K 2, Ca 3.0, Mg 1 => AA 301',
                'K 3, Ca 3.5, Mg 0.7 => AA 101 K3',
                'K 3, Ca 2.0, Mg 0.7 => AA 201 K3',
                'K 3, Ca 2.5, Mg 0.7 => AA 251 K3',
                'K 3, Ca 3.0, Mg 0.7 => AA 301 K3',
                'K 2, Ca 3.5, Mg 0.7 => AA 101',
                'K 2, Ca 2.0, Mg 0.7 => AA 201',
                'K 2, Ca 2.5, Mg 0.7 => AA 251',
                'K 2, Ca 3.0, Mg 0.7 => AA 301',
            ],
            'dialysate_flow_rates' => [300, 500, 800],
            'blood_flow_rates' => [200, 250, 300, 350, 400],
            'dialysate_temperatures' => [35.5, 36],
            'bicarbonates' => [28, 32, 35],
            'anticoagulants' => [
                ['value' => 'None', 'label' => 'None'],
                ['value' => 'Heparin', 'label' => 'Heparin'],
                ['value' => 'Enoxaparin', 'label' => 'Enoxaparin (Clexane®, Levenox®)'],
                ['value' => 'Fondaparinux', 'label' => 'Fondaparinux'],
                ['value' => 'Tinzaparin', 'label' => 'Tinzaparin (Innohep)'],
                ['value' => 'Other', 'label' => 'Other'],
            ],
            'hemodynamic_symptoms' => [
                ['name' => 'hypotention', 'label' => 'Hypotention'],
                ['name' => 'inotropic_dependent', 'label' => 'Inotropic dependent'],
                ['name' => 'severe_hypertension', 'label' => 'Severe hypertension (BP > 200/120 mmHg)'],
                ['name' => 'bradycardia', 'label' => 'Bradycardia (HR < 50/min)'],
                ['name' => 'arrhythmia', 'label' => 'Arrhythmia (Heart block, Tachyarrthmia)'],
            ],
            'raspiration_options' => [
                ['name' => 'hypoxia', 'label' => 'Hypoxia (O₂ sat < 95%, impeding respiration failure)'],
                ['name' => 'high_risk_airway_obstruction', 'label' => 'High risk to airway obstruction'],
            ],
            'oxygen_options' => ['None', 'Oxygen canula', 'Mask with bag', 'High flow oxygen', 'Ventilator'],
            'neurological_options' => [
                ['name' => 'gcs_drop', 'label' => 'GCS drop > 2 in the past 24 hours'],
                ['name' => 'drowsiness', 'label' => 'Drowsiness'],
            ],
            'life_threatening_condition_options' => [
                ['name' => 'acute_coronary_syndrome', 'label' => 'Acute coronary syndrome'],
                ['name' => 'cardiac_arrhymia_with_hypotension', 'label' => 'Cardiac arrhymia with hypotension'],
                ['name' => 'acute_ischemic_stroke', 'label' => 'Acute ischemic stroke'],
                ['name' => 'acute_ich', 'label' => 'Acute ICH'],
                ['name' => 'seizure', 'label' => 'Seizure'],
                ['name' => 'cardiac_arrest', 'label' => 'Cardiac arrest'],
            ],
            'monitors' => [
                ['name' => 'ekg', 'label' => 'EKG'],
                ['name' => 'observe_chest_pain', 'label' => 'Observe chest pain'],
                ['name' => 'observe_neuro_sign', 'label' => 'Observe neuro sign'],
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
                ['name' => 'sodium', 'min' => 128, 'max' => 145, 'type' => 'integer'],
                ['name' => 'heparin_loading_dose', 'min' => 250, 'max' => 2000, 'type' => 'integer'],
                ['name' => 'heparin_maintenance_dose', 'min' => 0, 'max' => 1500, 'type' => 'integer'],
                ['name' => 'enoxaparin_dose', 'min' => 0.3, 'max' => 0.8, 'type' => 'float'],
                ['name' => 'tinzaparin_dose', 'min' => 1500, 'max' => 3500, 'type' => 'interger'],
                ['name' => 'ultrafiltration', 'min' => 0, 'max' => 5500, 'type' => 'interger'],
                ['name' => 'ultrafiltration_hf', 'min' => 0, 'max' => 4000, 'type' => 'interger'],
                ['name' => 'glucose_50_percent_iv_volume', 'min' => 50, 'max' => 100, 'type' => 'interger'],
            ],
            'tpe_dialyzers' => ['Plasmaflo'],
            'albumin' => ['20% albumin 200 ml + NSS 800 ml', '20% albumin 150 ml + NSS 850 ml'],
        ];
    }

    protected function initForm($dialysisType)
    {
        $form = [
            'patient_type' => null,
            'dialysis_type' => $dialysisType,
            'predialysis_evaluations' => [
                'hemodynamic_stable' => false,
                'hypotention' => false,
                'inotropic_dependent' => false,
                'severe_hypertension' => false,
                'bradycardia' => false,
                'arrhythmia' => false,
                'respiration_stable' => false,
                'hypoxia' => false,
                'high_risk_airway_obstruction' => false,
                'oxygen_support' => 'None',
                'neurological_stable' => false,
                'gcs_drop' => false,
                'drowsiness' => false,
                'life_threatening_condition' => false,
                'acute_coronary_syndrome' => false,
                'cardiac_arrhymia_with_hypotension' => false,
                'acute_ischemic_stroke' => false,
                'acute_ich' => false,
                'seizure' => false,
                'cardiac_arrest' => false,
            ],

            'monitor' => [
                'standard' => false,
                'ekg' => false,
                'observe_chest_pain' => false,
                'observe_neuro_sign' => false,
                'other' => null,
            ],
            'predialysis_labs_request' => false,
            'postdialysis_esa' => false,
            'postdialysis_iron_iv' => false,
            'treatments_request' => null,
        ];

        $hd = [
            'access_type' => null,
            'access_site_coagulant' => null,
            'dialyzer' => null,
            'dialysate' => null,
            'dialysate_flow_rate' => null,
            'reverse_dialysate_flow' => false,
            'blood_flow_rate' => null,
            'dialysate_temperature' => null,
            'sodium' => '138',
            'sodium_profile' => false,
            'sodium_profile_start' => null,
            'sodium_profile_end' => null,
            'bicarbonate' => null,
            'anticoagulant' => null,
            'anticoagulant_none_drip_via_peripheral_iv' => false,
            'anticoagulant_none_nss_200ml_flush_q_hour' => false,
            'heparin_loading_dose' => null,
            'heparin_maintenance_dose' => null,
            'enoxaparin_dose' => null,
            'fondaparinux_bolus_dose' => null,
            'tinzaparin_dose' => null,
            'anticoagulant_other' => null,
            // 'ultrafiltration' => null,
            'ultrafiltration_min' => null,
            'ultrafiltration_max' => null,
            'dry_weight' => null,
            'glucose_50_percent_iv_volume' => null,
            'glucose_50_percent_iv_at' => null,
            'albumin_20_percent_prime' => null,
            'nutrition_iv_type' => null,
            'nutrition_iv_volume' => null,
            'post_dialysis_bw' => false,
            'prc_volume' => null,
            'ffp_volume' => null,
            'platelet_volume' => null,
            'transfusion_other' => null,
        ];

        $hf = [
            'access_type' => null,
            'access_site_coagulant' => null,
            'dialyzer' => null,
            'blood_flow_rate' => null,
            'anticoagulant' => null,
            'anticoagulant_none_drip_via_peripheral_iv' => false,
            'anticoagulant_none_nss_200ml_flush_q_hour' => false,
            'heparin_loading_dose' => null,
            'heparin_maintenance_dose' => null,
            'enoxaparin_dose' => null,
            'fondaparinux_bolus_dose' => null,
            'tinzaparin_dose' => null,
            'anticoagulant_other' => null,
            'ultrafiltration_min' => null,
            'ultrafiltration_max' => null,
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
            'dialyzer' => 'Plasmaflo',
            'replacement_fluid_albumin' => null,
            'replacement_fluid_albumin_volume' => null,
            'replacement_fluid_ffp_volume' => null,
            'blood_pumb' => null,
            'filtration_pumb' => null,
            'replacement_pumb' => null,
            'drain_pumb' => null,
            'dialysate_temperature' => null,
            'calcium_gluconate_10_percent_volume' => null,
            'calcium_gluconate_10_percent_timing' => null,
            'anticoagulant' => null,
            'anticoagulant_none_drip_via_peripheral_iv' => false,
            'anticoagulant_none_nss_200ml_flush_q_hour' => false,
            'heparin_loading_dose' => null,
            'heparin_maintenance_dose' => null,
            'enoxaparin_dose' => null,
            'fondaparinux_bolus_dose' => null,
            'tinzaparin_dose' => null,
            'anticoagulant_other' => null,
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

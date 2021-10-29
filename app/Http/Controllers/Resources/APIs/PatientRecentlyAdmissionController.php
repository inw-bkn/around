<?php

namespace App\Http\Controllers\Resources\APIs;

use App\Http\Controllers\Controller;
use App\Managers\Resources\AdmissionManager;
use Illuminate\Support\Carbon;

class PatientRecentlyAdmissionController extends Controller
{
    public function __invoke($hn)
    {
        $admission = (new AdmissionManager)->manage(key: $hn, recently: true);

        if (! $admission['found']) {
            if (! $admission['patient']['found']) {
                return [
                    'found' => false,
                    'hn' => null,
                ];
            }

            return [
                'found' => false,
                'hn' => $admission['patient']['hn'],
                'name' => $admission['patient']['first_name'].' '.$admission['patient']['last_name'],
                'gender' => $admission['patient']['gender'],
                'age' => $admission['patient']['dob']
                    ? Carbon::create($admission['patient']['dob'])->diffInYears()
                    : null,
                'ward_admit' => 'OPD ?', // 'แพทย์เวรและอีอาร์',
                'admitted_at' => null,
            ];
        }

        return [
            'found' => true,
            'an' => $admission['admission']->an,
            'hn' => $admission['admission']->patient->hn,
            'name' => $admission['admission']->patient->full_name,
            'gender' => $admission['admission']->patient->gender,
            'age' => $admission['admission']->patient_age_at_encounter_text,
            'ward_admit' => $admission['admission']->place_name,
            'admitted_at' => $admission['admission']->encountered_at_for_humans,
            'discharged_at' => $admission['admission']->dismissed_at_for_humans,
        ];
    }
}

<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Managers\Resources\AdmissionManager;

class AdmissionsController extends Controller
{
    public function __invoke($an)
    {
        $admission = (new AdmissionManager())->manage($an);

        if (! $admission['found']) {
            return $admission;
        }

        return [
            'found' => true,
            'hn' => $admission['admission']->patient->hn,
            'name' => $admission['admission']->patient->full_name,
            'gender' => $admission['admission']->patient->gender,
            'age' => $admission['admission']->patient_age_at_encounter_text,
            'ward_admit' => $admission['admission']->place_name,
            'admitted_at' => $admission['admission']->encountered_at_for_humans,
        ];
    }
}

<?php

namespace App\Http\Controllers\Resources;

use App\Contracts\PatientAPI;
use App\Http\Controllers\Controller;

class AdmissionsController extends Controller
{
    public function __invoke(PatientAPI $api, $an)
    {
        return $api->getAdmission($an);
    }
}

<?php

namespace App\Managers\Resources;

use App\Models\Resources\Admission;
use App\Models\Resources\Ward;
use Illuminate\Support\Str;

class AdmissionManager
{
    public function manage($key, $recently = false)
    {
        $admissionData = $recently
                            ? app()->make('App\Contracts\PatientAPI')->getAdmission($key)
                            : app()->make('App\Contracts\PatientAPI')->recentlyAdmission($key);

        if ($recently) {
            $admissionData = app()->make('App\Contracts\PatientAPI')->recentlyAdmission($key);
            if (! $admissionData['found']) {
                return $admissionData;
            }
            $an = $admissionData['an'];
        } else {
            $admissionData = app()->make('App\Contracts\PatientAPI')->getAdmission($key);
            $an = $key;
        }

        $admission = Admission::whereAn($an)->first();

        if ($admission) {
            // update
            $meta = $admission->meta;
            $meta['discharge_type'] = $admissionData['discharge_type_name'] ?? null;
            $meta['discharge_status'] = $admissionData['discharge_status_name'] ?? null;
            $admission->update([
                'dismissed_at' => $admissionData['dismissed_at'] ?? null,
                'meta' => $meta,
            ]);

            return [
                'found' => true,
                'admission' => $admission,
            ];
        }

        if (! $admissionData['found']) {
            return $admissionData;
        }

        // create
        $patient = (new PatientManager())->manage($admissionData['hn']);
        if (! $patient['found']) {
            return $patient; // rare case
        }

        $ward = $this->maintainWard($admissionData);

        return [
            'found' => true,
            'admission' => $patient['patient']->admissions()->create([
                'slug' => Str::uuid()->toString(),
                'an' => $an,
                'meta' => [
                    'attending' => $admissionData['attending_name'] ?? null,
                    'discharge_status' => $admissionData['discharge_status_name'] ?? null,
                    'discharge_type' => $admissionData['discharge_type_name'] ?? null,
                ],
                'encountered_at' => $admissionData['encountered_at'],
                'dismissed_at' => $admissionData['dismissed_at'],
                'ward_id' => $ward->id,
            ]),
        ];
    }

    protected function maintainWard(&$data)
    {
        if ($ward = Ward::whereNameRef($data['ward_name'])->first()) {
            return $ward;
        }

        return Ward::create([
            'name' => $data['ward_name'],
            'name_short' => $data['ward_name_short'],
            'name_ref' => $data['ward_name'],
        ]);
    }
}

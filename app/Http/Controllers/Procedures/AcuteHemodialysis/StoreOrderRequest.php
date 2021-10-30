<?php

namespace App\Http\Controllers\Procedures\AcuteHemodialysis;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dialysis_type' => 'required',
            'patient_type' => 'required',
            'dialysis_at' => 'required|exists:wards,name',
            'attending_staff' => 'required|exists:attending_staffs,name',
            'date_note' => 'required|date',
            'case_record_id' => 'required|exists:case_records,id',
            'patient_id' => 'required|exists:patients,id',
        ];
    }
}

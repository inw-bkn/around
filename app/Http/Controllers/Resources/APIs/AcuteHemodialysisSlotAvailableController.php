<?php

namespace App\Http\Controllers\Resources\APIs;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\NoteType;
use App\Models\Registry;

class AcuteHemodialysisSlotAvailableController extends Controller
{
    public function __invoke($dateNote)
    {
        // if avatar mode JUST call API
        $noteType = NoteType::findbyName('acute_hd_order');
        $registry = Registry::findbyName('acute_hd');

        // THIS ENDPOINT ALWAYS RETURN JSON
        return Note::with(['patient', 'author', 'caseRecord'])
                   ->whereNoteTypeId($noteType->id)
                   ->whereRegistryId($registry->id)
                   ->whereDateNote($dateNote)
                   ->whereNull('canceled_at')
                   ->get()
                   ->transform(function ($note) {
                       return [
                            'case_record_slug' => $note->caseRecord->slug,
                            'patient_name' => $note->patient->profile['first_name'],
                            'author' => $note->author->name,
                            'type' => $note->form['dialysis_type'],
                       ];
                   });
    }
}

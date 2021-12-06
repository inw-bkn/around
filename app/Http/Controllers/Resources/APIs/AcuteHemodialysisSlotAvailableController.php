<?php

namespace App\Http\Controllers\Resources\APIs;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\NoteType;
use App\Models\Registry;
use Illuminate\Support\Facades\Request;

class AcuteHemodialysisSlotAvailableController extends Controller
{
    protected $noteTypeId = 1;  // NoteType::findbyName('acute_hd_order');

    protected $registryId = 1;  // Registry::findbyName('acute_hd');

    protected $LIMIT_IN_UNIT_SLOTS = 32;

    protected $LIMIT_TPE_SLOTS = 3;

    public function __invoke()
    {
        // if avatar mode JUST call API

        $data = Request::all();

        /*
         - ไตเทียม ตาม slot 8*4 ไม่ทำ sledd
        - tpe ทำที่ไตเทียมเท่านั้น
        - tpe ทำวันละ 3 เท่านั้น
        - sledd ทำนอกไตเทียมเท่านั้น
        - นอกไตเทียมทำ hd4 hd+hf ได้วันละ 2 เคส
        - นอกไตเทียมทำ sleddได้วันละ 6 - hd เคส
        - นอกเวลาให้ f submit แล้วรอ chief nurse accept
        - นอกเวลาในแต่ละวันจะทำนอกหรือในไตเทียมเท่านั้น
         */

        if (str_starts_with($data['dialysis_at'], 'ไตเทียม')) {
            return $this->inUnitSlots($data);
        }

        return [];

        // THIS ENDPOINT ALWAYS RETURN JSON
    }

    protected function inUnitSlots(array $data)
    {
        $notes = Note::with(['patient', 'author', 'caseRecord'])
                    ->whereNoteTypeId($this->noteTypeId)
                    ->whereRegistryId($this->registryId)
                    ->whereDateNote($data['date_note'])
                    ->whereNull('canceled_at')
                    ->get()
                    ->transform(function ($note) {
                        return [
                            'case_record_slug' => $note->caseRecord->slug,
                            'patient_name' => $note->patient->profile['first_name'],
                            'author' => $note->author->name,
                            'type' => $note->form['dialysis_type'],
                            'tpe' => str_contains(strtolower($note->form['dialysis_type']), 'tpe') ? 1 : 0,
                            'slot_count' => $this->getSlotCount($note->form['dialysis_type']),
                        ];
                    });

        $tpeCount = $notes->sum('tpe');
        $sum = $notes->sum('slot_count');
        $requestSlot = $this->getSlotCount($data['dialysis_type']);
        $available = true;
        $reply = 'ok';

        if (($this->LIMIT_IN_UNIT_SLOTS - $sum) < $requestSlot) {
            $available = false;
            $reply = 'not enough slots';
        }

        if ($available && str_contains(strtolower($data['dialysis_type']), 'tpe') && $tpeCount === $this->LIMIT_TPE_SLOTS) {
            $available = false;
            $reply = 'TPE limit has been reached';
        }

        return [
            'slots' => $notes,
            'available' => $available,
            'reply' => $reply,
        ];
    }

    protected function getSlotCount($dialysisType)
    {
        if ($dialysisType === 'SLEDD') {
            return 4;
        } elseif (str_starts_with($dialysisType, 'HD+TPE')) {
            return 3;
        } elseif (strpos($dialysisType, '4') !== -1 || strpos($dialysisType, '3') !== -1) {
            return 2;
        } else {
            return 1;
        }
    }
}

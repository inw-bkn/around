<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Admission extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'array',
        'encountered_at' => 'datetime',
        'dismissed_at' => 'datetime',
    ];

    protected $appends = [
        'encountered_at_text',
        'dismissed_at_text',
        'place_name',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function place()
    {
        return $this->belongsTo('App\Models\Resources\Ward', 'ward_id', 'id');
    }

    public function getPatientAgeAtEncounterAttribute()
    {
        $ageInMonths = $this->encountered_at->diffInMonths($this->patient->dob);
        if ($ageInMonths < 12) {
            return $ageInMonths;
        }

        return $this->encountered_at->diffInYears($this->patient->dob);
    }

    public function getPatientAgeAtEncounterUnitAttribute()
    {
        $ageInYears = $this->encountered_at->diffInYears($this->patient->dob);
        if ($ageInYears >= 1) {
            return 'YO';
        }

        return 'MO';
    }

    public function getPatientAgeAtEncounterTextAttribute()
    {
        return $this->patient_age_at_encounter.' '.$this->patient_age_at_encounter_unit;
    }

    public function getLengthOfStayAttribute()
    {
        if (! $this->encountered_at || ! $this->dismissed_at) {
            return null;
        }

        $losInMinutes = $this->encountered_at->diffInMinutes($this->dismissed_at);
        // 1440 minutes in a day, more than 360 minutes count a day
        if ($losInMinutes >= 1440) {
            $losInDays = (int) floor($losInMinutes / 1440);
            $remains = $losInMinutes % 1440;
            if ($remains > 360) {
                $losInDays++;
            }

            return $losInDays;
        } elseif ($losInMinutes > 360) {
            return 1;
        }

        return 0;
    }

    public function getEncounteredAtTextAttribute()
    {
        return $this->encountered_at->tz(Auth::user() ? Auth::user()->timezone : 'UTC')->format('d M Y H:i');
    }

    public function getEncounteredAtForHumansAttribute()
    {
        if (! $this->encountered_at) {
            return null;
        }

        return $this->encountered_at->longRelativeToNowDiffForHumans();
    }

    public function getDismissedAtTextAttribute()
    {
        return $this->dismissed_at
            ? $this->dismissed_at->tz(Auth::user() ? Auth::user()->timezone : 'UTC')->format('d M Y H:i')
            : null;
    }

    public function getDismissedAtForHumansAttribute()
    {
        if (! $this->dismissed_at) {
            return null;
        }

        return $this->dismissed_at->longRelativeToNowDiffForHumans();
    }

    public function getPlaceNameAttribute()
    {
        return $this->place
            ? $this->place->name
            : null;
    }
}

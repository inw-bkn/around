<?php

namespace App\Models;

use App\Models\Resources\Division;
use App\Models\Resources\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'form' => 'array',
        'date_note' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function caseRecord()
    {
        return $this->belongsTo(CaseRecord::class);
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function scopeWithAuthorUsername($query)
    {
        $query->addSelect([
            'author_username' => User::select('name')
                    ->whereColumn('id', 'notes.user_id')
                    ->limit(1)
                    ->latest(),
        ]);
    }

    /**
     * Get all of the owning place models.
     */
    public function place()
    {
        return $this->morphTo();
    }

    public function getPlaceNameAttribute()
    {
        if (! $this->place) {
            return null;
        }

        return $this->place->name;
    }

    // public function scopeWithAllName($query, $placeName = 'wards')
    // {
    //     $query->addSelect([
    //         'division_name' => Division::select('name')
    //     ]);
    // }
}

<?php

namespace App\Models;

use App\Models\Resources\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'form' => 'array',
        'meta' => 'array',
        'dismissed_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function latestAcuteOrder()
    {
        return $this->hasOne(Note::class)->ofMany([
            'date_note' => 'max',
        ], function ($query) {
            $query->where('note_type_id', 1);
        });
    }
}

<?php

namespace App\Models;

use App\Models\Resources\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'form' => 'array',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}

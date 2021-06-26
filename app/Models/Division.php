<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'active',
        'name_eng',
        'department',
        'name_eng_short',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

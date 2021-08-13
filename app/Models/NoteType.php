<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteType extends Model
{
    use HasFactory;

    public static function findByName($name)
    {
        return static::whereName($name)->first();
    }
}

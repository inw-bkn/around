<?php

namespace App\Models\Resources;

use App\Models\Note;
use App\Traits\CSVLoader;
use App\Traits\ResourceExportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory, ResourceExportable, CSVLoader;

    protected $fillable = [
        'name',
        'name_short',
        'name_ref',
        'division_id',
    ];

    /**
     * Get the ward's notes.
     */
    public function notes()
    {
        return $this->morphMany(Note::class, 'place');
    }

    public static function findByName($name)
    {
        return static::whereName($name)->first();
    }
}

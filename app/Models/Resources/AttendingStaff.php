<?php

namespace App\Models\Resources;

use App\Traits\CSVLoader;
use App\Traits\ResourceExportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendingStaff extends Model
{
    use HasFactory, ResourceExportable, CSVLoader;

    protected $table = 'attending_staffs';

    protected $fillable = [
        'name',
        'division_id',
    ];

    public static function findByName($name)
    {
        return static::whereName($name)->first();
    }
}

<?php

namespace App\Models\Resources;

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
}

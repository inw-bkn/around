<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ResourceExportable
{
    public function download()
    {
        $rows = static::select($this->fillable)->get();
        $name = Str::of(class_basename(get_class($this)))->snake()->plural()->__toString().'.csv';
        $path = storage_path('app/temp/'.$name);
        $handle = fopen($path, 'w');

        fputcsv($handle, $this->fillable); // headrow
        foreach ($rows as $row) {
            fputcsv($handle, $row->toArray());
        }
        fclose($handle);

        return $path;
    }
}

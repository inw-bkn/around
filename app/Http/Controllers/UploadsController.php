<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    public function store()
    {
        Request::validate([
            'file' => 'required|file',
            'name' => 'required|string',
        ]);

        $data = Request::only(['name', 'old']);
        $path = Request::file('file')->store('uploads/'.$data['name']);

        if ($data['old']) {
            if (Storage::exists('uploads/'.$data['name'].'/'.$data['old'])) {
                Storage::delete('uploads/'.$data['name'].'/'.$data['old']);
            }
        }

        return [
            'filename' => basename($path),
        ];
    }

    public function show($path, $filename)
    {
        $path = $path.'/'.$filename;

        if (Storage::exists('uploads/'.$path)) {
            return Storage::response('uploads/'.$path);
        }
    }
}

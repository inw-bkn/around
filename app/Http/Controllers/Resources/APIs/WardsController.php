<?php

namespace App\Http\Controllers\Resources\APIs;

use App\Http\Controllers\Controller;
use App\Models\Resources\Ward;
use Illuminate\Support\Facades\Request;

class WardsController extends Controller
{
    public function __invoke()
    {
        $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
        $wards = Ward::select('name')
                     ->where('name', $like, '%'.Request::input('search').'%')
                     ->orWhere('name_short', $like, '%'.Request::input('search').'%')
                     ->orWhere('name_ref', $like, '%'.Request::input('search').'%')
                     ->whereActive(true)
                     ->get()
                     ->pluck('name');

        return $wards;
    }
}

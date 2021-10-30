<?php

namespace App\Http\Controllers\Resources\APIs;

use App\Http\Controllers\Controller;
use App\Models\Resources\AttendingStaff;
use Illuminate\Support\Facades\Request;

class AttendingStaffsController extends Controller
{
    public function __invoke()
    {
        $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
        $staffs = AttendingStaff::select('name')
                     ->when(Request::input('division_id') ?? null, function ($query, $divisionId) {
                         $query->whereDivisionId($divisionId);
                     })
                     ->where('name', $like, '%'.Request::input('search').'%')
                     ->whereActive(true)
                     ->get()
                     ->pluck('name');

        return $staffs;
    }
}

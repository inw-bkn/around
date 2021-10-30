<?php

namespace Database\Seeders;

use App\Models\Resources\AttendingStaff;
use Illuminate\Database\Seeder;

class AttendingStaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendingStaff::seed(storage_path('app/seeders/staffs.csv'));
    }
}

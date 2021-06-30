<?php

namespace Database\Seeders;

use App\Models\Resources\Ward;
use Illuminate\Database\Seeder;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ward::seed(storage_path('app/seeders/wards.csv'));
    }
}

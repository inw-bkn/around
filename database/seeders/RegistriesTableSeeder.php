<?php

namespace Database\Seeders;

use App\Models\Registry;
use App\Models\Resources\Division;
use Illuminate\Database\Seeder;

class RegistriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = now();

        Registry::insert([
            [
                'name' => 'Acute Hemodialysis',
                'name_eng' => 'Acute Hemodialysis',
                'route' => 'procedures.acute-hemodialysis.',
                'division_id' => Division::whereNameEngShort('nephrology')->first()->id,
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ]);
    }
}

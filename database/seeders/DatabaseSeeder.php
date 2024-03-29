<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DivisionsTableSeeder::class,
            WardsTableSeeder::class,
            AttendingStaffsTableSeeder::class,
            RegistriesTableSeeder::class,
            NoteTypesTableSeeder::class,
        ]);
    }
}

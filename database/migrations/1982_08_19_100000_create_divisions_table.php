<?php

use App\Models\Division;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->string('name_eng')->index();
            $table->string('name_eng_short', 60)->index();
            $table->string('department', 60)->index();
            $table->boolean('active')->default(true);
            $table->unsignedInteger('creator_id')->index()->nullable();
            $table->timestamps();
        });

        $datetime = now();

        Division::insert([
            [
                'name' => 'คณะแพทยศาสตร์ศิริราชพยาบาล',
                'name_eng' => 'Faculty of Medicine Siriraj Hospital',
                'name_eng_short' => 'faculty',
                'department' => 'faculty',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => 'ภาควิชาอายุรศาสตร์',
                'name_eng' => 'Department of Medicine',
                'name_eng_short' => 'medicine',
                'department' => 'medicine',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => 'ฝ่ายเภสัชกรรม',
                'name_eng' => 'Pharmacy Department',
                'name_eng_short' => 'pharmacy',
                'department' => 'pharmacy',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => 'วักกะวิทยา',
                'name_eng' => 'Division of Nephrology',
                'name_eng_short' => 'nephrology',
                'department' => 'medicine',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}

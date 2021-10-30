<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->string('name_short', 120)->index()->nullable();
            $table->string('name_ref')->unique();
            $table->unsignedSmallInteger('division_id')->default(1)->index()->constrained('divisions')->onDelete('cascade');
            $table->boolean('active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wards');
    }
}

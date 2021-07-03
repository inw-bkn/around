<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_records', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->unsignedSmallInteger('registry_id')->constrained('registies')->onDelete('cascade');
            $table->json('form');
            $table->foreignId('creator_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('updater_id')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('case_records');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registries', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name')->unique();
            $table->string('label')->index();
            $table->string('label_eng')->index();
            $table->string('route')->index();
            $table->unsignedSmallInteger('division_id')->default(1)->constrained('divisions')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('patient_registry', function (Blueprint $table) {
            $table->primary(['patient_id', 'registry_id']);
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->unsignedSmallInteger('registry_id')->constrained('registies')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('registry_user', function (Blueprint $table) {
            $table->primary(['user_id', 'registry_id']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedSmallInteger('registry_id')->constrained('registries')->onDelete('cascade');
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
        Schema::dropIfExists('registry_user');
        Schema::dropIfExists('patient_registry');
        Schema::dropIfExists('registries');
    }
}

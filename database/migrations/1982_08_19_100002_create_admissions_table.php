<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->string('an', 20)->index();
            $table->unsignedBigInteger('patient_id')->nullable()->constrained('patients')->onDelete('cascade');
            $table->json('meta')->nullable();
            $table->dateTime('encountered_at')->index()->nullable();
            $table->dateTime('dismissed_at')->index()->nullable();
            $table->unsignedSmallInteger('ward_id')->default(1)->constrained('wards')->onDelete('cascade');
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
        Schema::dropIfExists('admissions');
    }
}

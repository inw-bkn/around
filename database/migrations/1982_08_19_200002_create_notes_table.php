<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->uuid('slug');
            $table->unsignedSmallInteger('registry_id')->constrained('registies')->onDelete('cascade');
            $table->foreignId('case_record_id')->constrained('case_records')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('note_type_id')->constrained('note_types')->onDelete('cascade');
            $table->nullableMorphs('place');
            $table->json('form');
            $table->json('report')->nullable();
            $table->date('date_note')->nullable()->index();
            $table->date('submitted_at')->nullable()->index();
            $table->date('performed_at')->nullable()->index();
            $table->date('canceled_at')->nullable()->index();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('notes');
    }
}

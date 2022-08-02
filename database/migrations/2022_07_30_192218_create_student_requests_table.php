<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students' , 'id')->cascadeOnDelete();
            $table->foreignId('doctor_of_subjects_id')->constrained('doctor_of_subjects' ,'id')->cascadeOnDelete();
            $table->foreignId('term_id')->constrained('terms' ,'id')->cascadeOnDelete();
            $table->string('status')->default('open');
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
        Schema::dropIfExists('student_requests');
    }
};

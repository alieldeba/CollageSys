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
        Schema::create('doctor_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors' , 'id')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects' ,'id')->cascadeOnDelete();
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
        Schema::dropIfExists('doctor_requests');
    }
};

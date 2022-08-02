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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users' , 'id')->cascadeOnDelete();
            $table->foreignId('specialize')->constrained('specializes' , 'id')->nullable(false);
            $table->integer('grade')->nullable(false)->default(1);
            $table->integer('hours')->nullable(false)->default(0);
            $table->decimal('GPA')->default(0);
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
        Schema::dropIfExists('students');
    }
};

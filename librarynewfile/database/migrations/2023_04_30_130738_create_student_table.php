<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id('sno');
            $table->string('idNo',8);
            $table->string('firstName',20);
            $table->string('middleName',20)->nullable();
            $table->string('lastName',20);
            $table->string('suffix',5)->nullable();
            $table->string('course',15);
            $table->smallInteger('year');
            $table->date('birthDate');
            $table->string('gender',6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};

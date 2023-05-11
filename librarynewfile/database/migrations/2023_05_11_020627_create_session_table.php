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
        Schema::create('session', function (Blueprint $table) {
            $table->id('sessionNo');
            $table->unsignedBigInteger('sno');
            $table->string('studentpurpose',15);
            $table->string('studentsession',15);
            $table->timestamps();
            $table->foreign('sno')->references('sno')->on('student_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session');
    }
};

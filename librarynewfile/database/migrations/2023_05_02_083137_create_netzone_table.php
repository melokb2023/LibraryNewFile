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
        Schema::create('netzone', function (Blueprint $table) {
            $table->id('nno');
            $table->unsignedBigInteger('sno');
            $table->string('purpose',15);
            $table->string('sittingnumber',15);
            $table->timestamps();
            $table->foreign('sno')->references('sno')->on('student_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('netzone');
    }
};

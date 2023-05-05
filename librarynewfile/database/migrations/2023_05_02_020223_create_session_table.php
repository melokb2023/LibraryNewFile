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
            $table->id('sno');
            $table->unsignedBigInteger('sNo');
            $table->string('studentpurpose',15);
            $table->string('studentsession',15);
            $table->timestamps();
            $table->foreign('sNo') ->references('sNo') -> on('studentinfo');
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

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
        Schema::create('bookborrowingdetail', function (Blueprint $table) {
            $table->id('bbno');
            $table->string('booknumber',15);
            $table->string('bookdescription',15);
            $table->string('bookcode',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookborrowingdetail');
    }
};

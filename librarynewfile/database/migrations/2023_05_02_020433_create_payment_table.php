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
        Schema::create('payment', function (Blueprint $table) {
            $table->id('paymentno');
            $table->unsignedBigInteger('sno');
            $table->decimal('payment', $precision = 3, $scale = 2);
            $table->string('paymentmethod',20);
            $table->string('reasons',20);
            $table->string('remarks',20);
            $table->timestamps();
            $table->foreign('sno') ->references('sno') -> on('student');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};

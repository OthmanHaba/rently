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
        Schema::create('dynamic_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id');
            $table->date('date');
            $table->decimal('pricePerNight');
            $table->decimal('pricePerWeek');
            $table->decimal('pricePerMonth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_pricings');
    }
};

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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users' ,);
            $table->string('title');
            //خطوط الطول و العرض
            $table->string('lat')->nullable();
            $table->string('log')->nullable();
            //
            $table->string('address');//where to find us
            $table->text('description');//small description
            $table->text('longDescription');//small description
            $table->integer('numberOfRooms');
            $table->foreignId('location_id');
            $table->string('view');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

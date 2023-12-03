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
        // Create the 'room' table
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");   
            $table->unsignedBigInteger("idAccommodationArea");
            $table->integer("idNumberFloors");
            $table->unsignedBigInteger("idServices");
            $table->unsignedBigInteger("idServiceFeeSummary"); // tính tiền theo

            $table->string("roomName"); // Tên phòng, số phòng
            $table->float("priceRoom", 10, 3); // Giá phòng
            $table->string("interior"); // Nội thất
            $table->string("capacity"); // Sức chứa

            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('idAccommodationArea')->references('id')->on('accommodationArea');
            $table->foreign('idServiceFeeSummary')->references('id')->on('serviceFeeSummary');
            $table->foreign('idServices')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};

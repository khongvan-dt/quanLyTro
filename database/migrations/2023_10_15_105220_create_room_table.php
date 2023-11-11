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
       // Bảng phòng
       Schema::create('room', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger("user_id");
        $table->unsignedBigInteger("idAccommodationArea");
        $table->unsignedBigInteger("idTotalFloors");
        $table->unsignedBigInteger("idNumberFloors");
        $table->unsignedBigInteger("idserviceFeeSummary");
        $table->unsignedBigInteger("idServices");

        $table->string("roomName"); // tên phòng, số phòng
        $table->float("priceRoom", 10, 3); // giá phòng
        $table->string("interior"); // nội thất
        $table->string("capacity"); // sức chứa

        $table->timestamps();

        // Khóa ngoại
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('idAccommodationArea')->references('id')->on('accommodationArea');
        $table->foreign('idTotalFloors')->references('id')->on('totalFloors');
        $table->foreign('idNumberFloors')->references('id')->on('numberFloors');
        $table->foreign('idserviceFeeSummary')->references('id')->on('services');
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

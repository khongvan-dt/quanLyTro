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
        Schema::create('collectDay', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->unsignedBigInteger("idRoomcollectDay");
            $table->date("day");//ngày thu
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
            $table->foreign("idRoomcollectDay")->references("idRoomContract")->on("contract");
        });
    }
    //Bảng Ngày Thu Tiền:

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectDay');
    }
};

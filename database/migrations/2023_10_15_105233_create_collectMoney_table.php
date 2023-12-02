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
        Schema::create('collectMoney', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->unsignedBigInteger("idRoomCollectMoney");
            $table->date("time");//thời gian nhận được tiền thu
            $table->float("totalAmountCollected");// tổng tiền thu được
            $table->boolean("collectedMoney"); //(sử dụng một cột boolean)
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
        });
    }
    // thu tiền
  
    public function down(): void
    {
        Schema::dropIfExists('collectMoney');
    }
};

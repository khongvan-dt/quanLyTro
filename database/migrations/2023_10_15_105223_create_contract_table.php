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
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->unsignedBigInteger("idRoomContract");
            $table->string("imgContract");
            $table->date("startDate");
            $table->date("endDate");
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
            $table->foreign("idRoomContract")->references("id")->on("room");
        });
    }
    //bảng hợp đồng
    
    public function down(): void
    {
        Schema::dropIfExists('contract');
    }
};

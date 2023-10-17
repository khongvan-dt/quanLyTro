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
        Schema::create('tenant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->unsignedBigInteger("idRoomTenant");
            $table->string("residentName");
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
            $table->foreign("idRoomTenant")->references("idRoomContract")->on("contract");
        });
    }
    //người trong trọ

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant');
    }
};

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
        //từng tầng
        Schema::create('numberFloors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->unsignedBigInteger("idTotalFloors");
            $table->integer("floors");
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
            $table->foreign("idTotalFloors")->references("id")->on("totalFloors");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('numberFloors');
    }
};

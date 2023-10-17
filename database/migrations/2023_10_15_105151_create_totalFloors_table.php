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
        //bảng tông số tầng
        Schema::create('totalFloors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->integer("sumFloors");
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('totalFloors');
    }
};

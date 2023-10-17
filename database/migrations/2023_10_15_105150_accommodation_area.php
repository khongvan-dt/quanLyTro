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
        Schema::create('accommodationArea', function (Blueprint $table) {
            $table->id(); // Cột id làm Primary Key
            $table->unsignedBigInteger('idUser'); // Foreign Key trỏ đến Bảng users
            $table->string('city');
            $table->string('districts');//quận huyện
            $table->string('wardsCommunes');//phường xã
            $table->string('streetAddress');//đường
            $table->timestamps(); // Thêm cột created_at và updated_at
            // Định nghĩa các khóa ngoại
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodationArea');
    }
};

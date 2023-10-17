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
        Schema::create('serviceFeeSummary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idUser");
            $table->string("name");
            $table->timestamps();
            //khóa ngoại
            $table->foreign("idUser")->references("id")->on("users");
        });
    }
    // Bảng Tính Tiền Theo tháng,đầu người,miễn phí-> tóm tắt phí dịch vụ

   
    public function down(): void
    {
        Schema::dropIfExists('serviceFeeSummary');
    }
};

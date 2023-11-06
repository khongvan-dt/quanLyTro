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
        // tiền dịch vụ 
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->decimal("electricityBill", 10, 3)->nullable();//tiền 1 số điện
            $table->decimal("waterBill", 10, 3)->nullable();//tiền 1 khối nước
            $table->decimal("wifiFee", 10, 3)->nullable();//tiền wifi
            $table->decimal("cleaningFee", 10, 3)->nullable();//dọn dẹp
            $table->decimal("parkingFee", 10, 3)->nullable();// tiền để xe
            $table->decimal("fine", 10, 3)->nullable();//tiền phạt
            $table->decimal("other_fees", 10, 3)->nullable();// khoản khác
            $table->decimal("sumServices", 10, 3);//tổng tiền dịch vụ
            $table->timestamps();
            // Tạo khóa ngoại cho user_id
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};

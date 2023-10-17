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
            $table->float("electricityBill");//tiền 1 số điện
            $table->float("waterBill");//tiền 1 khối nước
            $table->float("wifiFee")->nullable();//tiền wifi
            $table->float("cleaningFee")->nullable();//dọn dẹp
            $table->float("parkingFee")->nullable();// tiền để xe
            $table->float("fine")->nullable();//tiền phạt
            $table->float("other_fees")->nullable();// khoản khác
            $table->float("sumServices");//tổng tiền dịch vụ

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

<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->string('phone_number');
            $table->text('address');
            $table->text('note');
            $table->string('status')->default('Menunggu Pembayaran'); // Menunggu Pembayaran, Menunggu Konfirmasi Admin, Diproses, Dikirim, Terkirim, Dibatalkan
            $table->date('order_date')->default(Carbon::now());
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

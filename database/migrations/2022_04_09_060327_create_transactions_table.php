<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table -> integer('product_id') ;
            $table -> integer('users_id') ;
            $table -> integer('transaction_total') ;
            $table-> date('order_date');
            $table -> string('transaction_status') ;
            // IN_CART, PENDING, SUCCESS, CANCEL, FAILED
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

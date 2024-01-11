<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentFlowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_flow', function (Blueprint $table) {
            $table->id();
			$table->double('order_number');//訂單編號
			$table->string('member');
			$table->string('seller');
			$table->string('state'); //訂單狀態
			$table->string('product');
			$table->string('transport');
			$table->double('price', 15, 8);
			$table->string('quantity');
			$table->double('total_price', 15, 8);
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
        Schema::dropIfExists('payment_flow');
    }
}

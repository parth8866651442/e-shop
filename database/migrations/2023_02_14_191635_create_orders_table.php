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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_shipping_id')->nullable();
            $table->float('coupon_id')->nullable();
            $table->string('order_number')->unique();
            $table->string('invoice_number')->unique();
            $table->integer('items_count');
            $table->float('sub_total');
            $table->float('coupon_amount')->nullable();
            $table->float('shipping_amount');
            $table->float('total_amount');
            $table->enum('payment_method',['cod','online'])->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('status',['new','process','delivered','cancel'])->default('new');
            $table->string('cancel_reason')->nullable();
            $table->timestamps('cancel_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};

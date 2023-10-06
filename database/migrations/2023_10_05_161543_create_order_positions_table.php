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
        Schema::create('order_positions', function (Blueprint $table) {

            $table->id('record_id')
                ->comment('ID записи');

            $table->unsignedBigInteger('order_id')
                ->comment('ID заказа');

            $table->unsignedBigInteger('product_id')
                ->comment('ID товара');

            $table->unsignedFloat('price')
                ->comment('Цена товара на момент покупки');

            $table->unsignedFloat('discount')
                ->default(0)
                ->comment('Скидка на товар');

            $table->unsignedFloat('amount')
                ->comment('Итоговая цена товара');

            $table->timestamps();

            $table->comment('Позиции заказа');
        });

        Schema::table('order_positions', function(Blueprint $table) {

            $table->foreign('order_id', 'position_order_key')
                ->references('order_id')
                ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_positions');
    }
};

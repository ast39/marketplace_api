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
        Schema::create('orders', function (Blueprint $table) {

            $table->id('order_id')
                ->comment('ID заказа');

            $table->unsignedBigInteger('owner_id')
                ->comment('ID заказчика');

            $table->text('about')
                ->nullable()
                ->default(null)
                ->comment('Комментарии к заказу');

            $table->tinyInteger('status')
                ->default(0)
                ->comment('Статус заказа');

            $table->timestamps();

            $table->comment('Заказы');
        });

        Schema::table('orders', function(Blueprint $table) {

            $table->foreign('owner_id', 'order_owner_key')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('order_logs', function (Blueprint $table) {

            $table->id('record_id')
                ->comment('ID записи');

            $table->unsignedBigInteger('order_id')
                ->comment('ID заказа');

            $table->tinyInteger('status')
                ->comment('Статус заказа');

            $table->timestamps();

            $table->comment('Лог изменений статусов заказов');
        });

        Schema::table('order_logs', function(Blueprint $table) {

            $table->foreign('order_id', 'log_order_key')
                ->references('order_id')
                ->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_logs');
    }
};

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
        Schema::create('products', function (Blueprint $table) {

            $table->id('product_id')
                ->comment('ID товара');

            $table->unsignedBigInteger('category_id')
                ->comment('ID категории');

            $table->string('title')
                ->comment('Название');

            $table->text('about')
                ->nullable()
                ->default(null)
                ->comment('Описание товара');

            $table->string('unit')
                ->default('шт')
                ->comment('Единица измерения');

            $table->unsignedBigInteger('stock')
                ->default(0)
                ->comment('Остаток');

            $table->unsignedFloat('price')
                ->default(0)
                ->comment('Цена');

            $table->text('options')
                ->nullable()
                ->default(null)
                ->comment('Характеристики товара');

            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('Статус записи');

            $table->timestamps();

            $table->comment('Товары');
        });

        Schema::table('products', function(Blueprint $table) {

            $table->foreign('category_id', 'product_category_key')
                ->references('category_id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

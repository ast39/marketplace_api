<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id('category_id');

            $table->unsignedBigInteger('parent_id')
                ->nullable()
                ->default(null)
                ->comment('Родительская категория');

            $table->string('title')
                ->comment('Название категории');

            $table->text('about')
                ->nullable()
                ->default(null)
                ->comment('Описание категории');

            $table->unsignedTinyInteger('status')
                ->default(0)
                ->comment('Статус записи');

            $table->timestamps();

            $table->comment('Категории товаров');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

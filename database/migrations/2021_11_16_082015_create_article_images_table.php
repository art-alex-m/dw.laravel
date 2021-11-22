<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')
                ->nullable()
                ->comment('ID статьи')
                ->constrained()
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->text('path')->nullable(false)->comment('Путь');
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
        Schema::table('article_images', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });
        Schema::dropIfExists('article_images');
    }
}

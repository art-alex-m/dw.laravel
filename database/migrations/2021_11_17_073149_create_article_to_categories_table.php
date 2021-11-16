<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_to_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->comment('ID категории')
                ->nullable(false)
                ->constrained('article_categories')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreignId('article_id')
                ->comment('ID статьи')
                ->nullable(false)
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_to_categories', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['article_id']);
        });
        Schema::dropIfExists('article_to_categories');
    }
}

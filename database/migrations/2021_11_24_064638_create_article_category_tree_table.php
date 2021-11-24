<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('category_id')
                ->nullable(true)
                ->comment('Идентификатор категории статьи')
                ->constrained('article_categories')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->nestedSet();
        });

        Schema::table('article_categories', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('article_category_tree');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->comment('ID статьи')->constrained()->onDelete('CASCADE')->onUpdate(
                'CASCADE'
            );
            $table->date('today')->nullable(false)->comment('Дата');
            $table->bigInteger('value')->default(0)->comment('Количество');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}

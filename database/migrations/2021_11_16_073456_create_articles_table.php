<?php

use App\Enum\ArticleStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable(true)
                ->comment('ID автора')
                ->constrained()
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->string('status')
                ->default(ArticleStatusEnum::DRAFT)
                ->nullable(false)
                ->index()
                ->comment('Статус');

            $table->string('title', 300)->nullable(false)->comment('Заголовок');
            $table->string('short', 500)->comment('Краткое описание');
            $table->text('text')->comment('Текст статьи');
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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('articles');
    }
}

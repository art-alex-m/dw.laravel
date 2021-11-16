<?php

use App\Enum\ArticleCommentStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable(true)
                ->comment('ID автора')
                ->constrained()
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');

            $table->foreignId('article_id')
                ->nullable(false)
                ->comment('ID статьи')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->string('status')
                ->default(ArticleCommentStatusEnum::MODERATION)
                ->nullable(false)
                ->index()
                ->comment('Статус');

            $table->text('text')->nullable(false)->comment('Текст');

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
        Schema::dropIfExists('article_comments');
    }
}

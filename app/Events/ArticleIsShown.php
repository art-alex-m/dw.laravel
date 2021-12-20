<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleIsShown
{
    use Dispatchable, SerializesModels;

    /** @var int Идентификатор статьи */
    protected int $articleId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $articleId)
    {
        $this->articleId = $articleId;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }
}

<?php

namespace App\Services;

use App\Models\Article\View;
use DateTime;

/**
 * Class ArticleViewsIncreaseService.
 *
 * @package App\Services
 */
class ArticleViewsIncreaseService
{
    /**
     * Увеличивает количество просмотров статьи.
     *
     * @param int $articleId
     */
    public function increase(int $articleId): void
    {
        /** @var View $today */
        $today = View::query()->firstOrNew()->byArticleId($articleId)->today()->firstOrNew();

        $today->value += 1;
        $today->today = new DateTime();
        $today->article_id = $articleId;

        $today->save();
    }
}

<?php

namespace App\Repositories\Site;

use App\Enum\ArticleStatusEnum;
use App\Models\Article\Article;
use App\Models\Article\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ArticleRepository.
 *
 * @package App\Repositories\Site
 */
class ArticleRepository
{
    /**
     * Возвращает заданное количество опубликованных новостей.
     *
     * @param int $count
     * @param Category|null $category
     *
     * @return Collection|array
     */
    public function getPublishedNews(int $count, ?Category $category): Collection|array
    {
        $query = Article::query()
            ->with(['image'])
            ->where('status', '=', ArticleStatusEnum::PUBLISHED)
            ->latest()
            ->take($count);

        if ($category instanceof Category) {
            $query->join('article_to_categories as ac', 'ac.article_id', '=', 'articles.id')
                ->where('ac.category_id', '=', $category->id);
        }

        return $query->get();
    }
}

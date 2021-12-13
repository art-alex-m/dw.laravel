<?php

namespace App\Repositories\Site;

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
            ->published()
            ->latest()
            ->take($count);

        if ($category instanceof Category) {
            $query
                ->select('articles.*')
                ->join('article_to_categories as ac', 'ac.article_id', '=', 'articles.id')
                ->where('ac.category_id', '=', $category->id);
        }

        return $query->get();
    }

    /**
     * Возвращает модель по слагу.
     *
     * @param string $slug
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getBySlug(string $slug)
    {
        return Article::query()
            ->withCount(['comments'])
            ->with(['image', 'totalViews', 'categories'])
            ->where('slug', '=', $slug)
            ->published()
            ->firstOrFail();
    }
}

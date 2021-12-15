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
        if ($category instanceof Category) {
            $query = $category->articles();
        } else {
            $query = Article::query();
        }

        $query
            ->with(['image'])
            ->published()
            ->latest()
            ->take($count);

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
            ->bySlug($slug)
            ->published()
            ->firstOrFail();
    }
}

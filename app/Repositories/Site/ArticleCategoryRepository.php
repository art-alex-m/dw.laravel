<?php

namespace App\Repositories\Site;

use App\Models\Article\CategoryTree;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ArticleCategoryRepository.
 *
 * @package App\Repositories\Site
 */
class ArticleCategoryRepository
{
    /**
     * Возвращает список категорий первого уровня.
     *
     * @return Collection|array
     */
    public function getCategoryFirstLevel(): Collection|array
    {
        return CategoryTree::with(['descendants.category'])
            ->whereNull('parent_id')
            ->firstOrFail()
            ->descendants;
    }
}

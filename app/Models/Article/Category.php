<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category.
 *
 * @package App\Models\Article
 */
class Category extends Model
{
    protected $table = 'article_categories';

    /**
     * Статьи категории.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function articles()
    {
        return $this->hasManyThrough(Article::class, ArticleToCategory::class);
    }
}

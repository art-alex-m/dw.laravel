<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class ArticleToCategory.
 *
 * @package App\Models\Article
 */
class ArticleToCategory extends Pivot
{
    public $timestamps = false;
    protected $table = 'article_to_categories';
}

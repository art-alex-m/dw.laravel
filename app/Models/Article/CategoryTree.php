<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class CategoryTree.
 * Структура категорий
 *
 * @package App\Models\Article
 */
class CategoryTree extends Model
{
    use NodeTrait;

    public $timestamps = false;
    protected $table = 'article_category_tree';

    /**
     * Объект категории
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

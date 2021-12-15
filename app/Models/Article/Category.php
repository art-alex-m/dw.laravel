<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category.
 *
 * @package App\Models\Article
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property string $slug
 */
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'article_categories';

    /**
     * Статьи категории.
     *
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, ArticleToCategory::class);
    }

    /**
     * Объект сортировки
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function treeNode()
    {
        return $this->hasOne(CategoryTree::class);
    }
}

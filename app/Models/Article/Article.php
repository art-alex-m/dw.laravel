<?php

namespace App\Models\Article;

use App\Enum\ArticleStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Article.
 *
 * @package App\Models
 */
class Article extends Model
{
    /**
     * Изображение статьи.
     *
     * @return HasOne
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    /**
     * Рубрики статьи.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, ArticleToCategory::class);
    }

    /**
     * Комментарии статьи
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Общее количество просмотров
     *
     * @return HasOne
     */
    public function totalViews(): HasOne
    {
        return $this->hasOne(ViewTotal::class);
    }

    /**
     * Модели просмотров
     *
     * @return HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    /**
     * Ограничивает выборку опубликованными статьями.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', '=', ArticleStatusEnum::PUBLISHED);
    }

    /**
     * Выбирает запись по слагу.
     *
     * @param Builder $query
     * @param string $slug
     *
     * @return Builder
     */
    public function scopeBySlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', '=', $slug);
    }
}

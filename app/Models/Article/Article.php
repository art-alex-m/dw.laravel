<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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
     * @return HasManyThrough
     */
    public function categories(): HasManyThrough
    {
        return $this->hasManyThrough(Category::class, ArticleToCategory::class, secondKey: 'id');
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
}

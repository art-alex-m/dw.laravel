<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    /**
     * Рубрики статьи.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function categories()
    {
        return $this->hasManyThrough(Category::class, ArticleToCategory::class);
    }

    /**
     * Комментарии статьи
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Общее количество просмотров
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function totalViews()
    {
        return $this->hasOne(ViewTotal::class);
    }
}

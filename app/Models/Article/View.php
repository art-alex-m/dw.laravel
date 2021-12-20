<?php

namespace App\Models\Article;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class View.
 *
 * @package App\Models\Article
 */
class View extends Model
{
    protected $table = 'article_views';
    public $timestamps = false;

    protected $casts = [
        'today' => 'date:Y-m-d',
    ];

    /**
     * Ограничивает выборку по дате.
     *
     * @param Builder $query
     * @param DateTime $date
     *
     * @return Builder
     */
    public function scopeByDate(Builder $query, DateTime $date): Builder
    {
        return $query->where('today', '=', $date);
    }

    /**
     * Ограничивает выборку по текущей дате.
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeToday(Builder $query): Builder
    {
        return $this->scopeByDate($query, new DateTime());
    }

    /**
     * Ограничивает выборку по идентификатору статьи.
     *
     * @param Builder $query
     * @param int $articleId
     *
     * @return Builder
     */
    public function scopeByArticleId(Builder $query, int $articleId): Builder
    {
        return $query->where('article_id', '=', $articleId);
    }
}

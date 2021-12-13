<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ViewTotal.
 *
 * @package App\Models\Article
 *
 * @property-read int $article_id
 * @property-read int $total
 */
class ViewTotal extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'article_view_total';
    protected $primaryKey = 'article_id';
}

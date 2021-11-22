<?php

namespace App\Models\Article;

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
}

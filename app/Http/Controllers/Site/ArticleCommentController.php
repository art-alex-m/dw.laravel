<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Repositories\Site\ArticleCommentRepository;

/**
 * Class ArticleCommentController.
 *
 * @package App\Http\Controllers\Site
 */
class ArticleCommentController extends Controller
{
    protected ArticleCommentRepository $commentRepository;

    /**
     * @param ArticleCommentRepository $commentRepository
     */
    public function __construct(ArticleCommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param Article $article
     * @param int $limit
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function comments(Article $article, int $limit = -1)
    {
        $comments = $this->commentRepository->getPublished($limit, $article->id);

        return view('components.site.article.comment-list', compact('comments'));
    }
}

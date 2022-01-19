<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ArticleCommentCreateRequest;
use App\Models\Article\Article;
use App\Repositories\Site\ArticleCommentRepository;
use App\Services\ArticleCommentService;

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
     * Возвращает список комментариев к статье.
     *
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

    /**
     * Создает новый комментарий к статье.
     *
     * @param ArticleCommentCreateRequest $request
     */
    public function create(ArticleCommentCreateRequest $request, ArticleCommentService $service)
    {
        $comment = $service->create($request->user(), $request->validated()['comment']);

        return redirect()->back()->with('comment-created', 1);
    }
}

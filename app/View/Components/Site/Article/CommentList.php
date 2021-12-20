<?php

namespace App\View\Components\Site\Article;

use App\Repositories\Site\ArticleCommentRepository;
use Illuminate\View\Component;

/**
 * Class CommentList.
 *
 * @package App\View\Components\Site\Article
 */
class CommentList extends Component
{
    protected ArticleCommentRepository $commentRepository;
    /** @var int Количество комментариев. */
    protected int $count = 20;
    /** @var int|null Идентификатор статьи. */
    protected ?int $articleId = null;

    /**
     * Конструктор
     *
     * @param ArticleCommentRepository $commentRepository
     * @param int $count
     * @param int|null $articleId
     */
    public function __construct(ArticleCommentRepository $commentRepository, int $count, ?int $articleId)
    {
        $this->commentRepository = $commentRepository;
        $this->count = $count;
        $this->articleId = $articleId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $comments = $this->commentRepository->getPublished($this->count, $this->articleId);

        return view('components.site.article.comment-list', compact('comments'));
    }
}

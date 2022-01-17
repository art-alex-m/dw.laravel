<?php

namespace App\View\Components\Site\Article;

use App\Repositories\Site\ArticleCommentRepository;
use Illuminate\View\Component;

/**
 * Class CommentButton.
 *
 * @package App\View\Components\Site\Article
 */
class CommentButton extends Component
{
    protected ArticleCommentRepository $commentRepository;
    /** @var int Количество комментариев. */
    protected int $count = 20;
    /** @var int Идентификатор статьи. */
    protected int $articleId;

    /**
     * @param ArticleCommentRepository $commentRepository
     * @param int $count
     * @param int|null $articleId
     */
    public function __construct(ArticleCommentRepository $commentRepository, int $count, int $articleId)
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
        $total = $this->commentRepository->countPublished($this->articleId);

        if ($total <= $this->count) {
            return null;
        }

        return view('components.site.article.comment-button');
    }
}

<?php

namespace App\View\Components\Site\Article;

use Illuminate\View\Component;

/**
 * Class CommentForm.
 * Компонент формы создания комментария к статье.
 *
 * @package App\View\Components\Site\Article
 */
class CommentForm extends Component
{
    /** @var string URL для сохранения комментария. */
    public string $saveUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $saveUrl)
    {
        $this->saveUrl = $saveUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.article.comment-form');
    }
}

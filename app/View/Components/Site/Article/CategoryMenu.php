<?php

namespace App\View\Components\Site\Article;

use App\Repositories\Site\ArticleCategoryRepository;
use Illuminate\View\Component;

/**
 * Class CategoryMenu.
 *
 * @package App\View\Components\Site\Article
 */
class CategoryMenu extends Component
{
    protected ArticleCategoryRepository $categoryRepository;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = $this->categoryRepository->getCategoryFirstLevel();

        return view('components.site.article.category-menu', compact('categories'));
    }
}

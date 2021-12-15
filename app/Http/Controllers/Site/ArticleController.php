<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article\Category;
use App\Repositories\Site\ArticleRepository;
use Illuminate\Contracts\View\View;

/**
 * Class ArticleController.
 *
 * @package App\Http\Controllers\Site
 */
class ArticleController extends Controller
{
    protected ArticleRepository $articleRepository;

    /**
     * Конструктор.
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Отображение списка последних новостей.
     *
     * @param Category|null $category
     *
     * @return View
     */
    public function index(?Category $category = null): View
    {
        $news = $this->articleRepository->getPublishedNews(20, $category);

        return view('site.articles.index', compact('news'));
    }

    /**
     * Отображение детальной информации о статье.
     *
     * @param string $slug
     *
     * @return View
     */
    public function view(string $slug): View
    {
        $article = $this->articleRepository->getBySlug($slug);

        return view('site.articles.detail', ['item' => $article]);
    }
}

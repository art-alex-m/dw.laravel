<?php

namespace App\Listeners;

use App\Events\ArticleIsShown;
use App\Services\ArticleViewsIncreaseService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * Class ArticleViewsIncrease.
 *
 * @package App\Listeners
 */
class ArticleViewsIncrease implements ShouldQueue
{
    use InteractsWithQueue;

    /** @var int Количество попыток обработки задания. */
    public int $tries = 5;
    /** @var int Время (в секундах) до обработки задания. */
    public $delay = 30;

    /** @var ArticleViewsIncreaseService */
    protected ArticleViewsIncreaseService $increaseService;

    /**
     * Create the event listener.
     *
     * @param ArticleViewsIncreaseService $increaseService
     */
    public function __construct(ArticleViewsIncreaseService $increaseService)
    {
        $this->increaseService = $increaseService;
    }

    /**
     * Handle the event.
     *
     * @param ArticleIsShown $event
     * @return void
     */
    public function handle(ArticleIsShown $event)
    {
        $this->increaseService->increase($event->getArticleId());
    }
}

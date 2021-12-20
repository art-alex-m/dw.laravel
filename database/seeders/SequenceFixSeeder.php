<?php

namespace Database\Seeders;

use App\Services\DbSequenceService;
use Illuminate\Database\Seeder;

/**
 * Class SequenceFixSeeder.
 *
 * @package Database\Seeders
 */
class SequenceFixSeeder extends Seeder
{
    public function run(DbSequenceService $sequenceService)
    {
        $sequenceService->setMax('article_categories');
        $sequenceService->setMax('article_category_tree');
        $sequenceService->setMax('article_comments');
        $sequenceService->setMax('article_images');
        $sequenceService->setMax('article_to_categories');
        $sequenceService->setMax('article_views');
        $sequenceService->setMax('articles');
    }
}

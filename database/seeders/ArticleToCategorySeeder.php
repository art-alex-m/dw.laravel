<?php

namespace Database\Seeders;

use App\Models\Article\Article;
use Database\Factories\ArticleToCategoryFactory;
use Illuminate\Database\Seeder;

/**
 * Class ArticleToCategorySeeder.
 *
 * @package Database\Seeders
 */
class ArticleToCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ArticleToCategoryFactory $toCategoryFactory)
    {
        $count = Article::query()->count();
        $toCategoryFactory->count($count)->withStartId()->withDbArticles()->withRandomCategory()->create();
    }
}

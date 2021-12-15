<?php

namespace Database\Seeders;

use App\Lib\Factory\IndexState;
use App\Models\Article\Article;
use Database\Factories\ArticleToCategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $pivotIndex = new IndexState('id', 1);

        $toCategoryFactory->count($count)->withStartId($pivotIndex)->withDbArticles()->withRandomCategory()->create();

        $toCategoryFactory->count($count)->withStartId($pivotIndex)->withDbCategories()->withRandomArticle()->create();

        /// Удалить дубликаты
        $sql = <<<SQL
delete 
from article_to_categories 
where id not in (
    select min(id) 
    from article_to_categories 
    group by category_id, article_id
    )
SQL;
        DB::statement($sql);
    }
}

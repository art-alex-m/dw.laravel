<?php

namespace Database\Seeders;

use App\Models\Article\Category;
use App\Models\Article\CategoryTree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class CategorySeeder.
 *
 * @package Database\Seeders
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryList = [
            'Все',
            'За окном',
            'Кто в ответе',
            'По форме',
            'Кроме голодовки',
            'Журнал',
            'Лайфхаки',
            'За деньги',
        ];

        $categoryTree = [
            'category_id' => 1,
            'children' => [
                ['category_id' => 2],
                ['category_id' => 3],
                ['category_id' => 4],
                ['category_id' => 5],
                ['category_id' => 6],
                ['category_id' => 7],
                ['category_id' => 8],
            ],
        ];

        foreach ($categoryList as $key => $name) {
            ++$key;
            $category = new Category();
            $category->title = $name;
            $category->id = $key;
            $category->slug = Str::slug($name);
            $category->save();
        }

        CategoryTree::create($categoryTree);
    }
}

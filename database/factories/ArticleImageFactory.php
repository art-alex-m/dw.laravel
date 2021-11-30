<?php

namespace Database\Factories;

use App\Lib\Factory\WithArticleIdTrait;
use App\Lib\Factory\WithStartIdTrait;
use App\Models\Article\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ArticleImageFactory.
 *
 * @package Database\Factories
 */
class ArticleImageFactory extends Factory
{
    use WithArticleIdTrait;
    use WithStartIdTrait;

    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => 1,
            'path' => $this->getRandom(),
        ];
    }

    /**
     * @return string
     */
    protected function getRandom(): string
    {
        $dir = storage_path('app/public/images/articles');

        if (!file_exists($dir)) {
            mkdir($dir, recursive: true);
        }

        $image = $this->faker->image(dir: $dir, category: 'cats', fullPath: false);

        return "/storage/images/articles/$image";
    }
}

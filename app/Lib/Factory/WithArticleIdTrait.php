<?php

namespace App\Lib\Factory;

/**
 * Trait WithArticleIdTrait.
 *
 * @package App\Lib\Factory
 */
trait WithArticleIdTrait
{
    /**
     * Прикрепляет идентификатор статьи.
     *
     * @param int $id
     *
     * @return $this
     */
    public function withArticleId(int $id): self
    {
        return $this->state(fn($attributes) => [
            'article_id' => $id,
        ]);
    }

}

<?php

namespace App\Lib\Factory;

/**
 * Trait WithUserIdTrait.
 *
 * @package App\Lib\Factory
 */
trait WithUserIdTrait
{
    /**
     * Прикрепляет идентификатор автора
     *
     * @param int $id
     *
     * @return $this
     */
    public function withUserId(int $id): self
    {
        return $this->state(fn($attributes) => [
            'user_id' => $id,
        ]);
    }
}

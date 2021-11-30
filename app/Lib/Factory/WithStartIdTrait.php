<?php

namespace App\Lib\Factory;

/**
 * Trait WithStartIdTrait.
 *
 * @package App\Lib\Factory
 */
trait WithStartIdTrait
{
    /**
     * Вставляет данные с начала списка.
     *
     * @param int|IndexState $start
     * @param string $column
     * @return WithStartIdTrait
     */
    public function withStartId(int|IndexState $start = 0, string $column = 'id'): static
    {
        if ($start instanceof IndexState) {
            $callback = $start;
        } else {
            $callback = new IndexState($column, $start);
        }

        return $this->state($callback);
    }
}

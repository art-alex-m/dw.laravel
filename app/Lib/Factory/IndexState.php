<?php

namespace App\Lib\Factory;

/**
 * Class IndexState.
 *
 * @package App\Lib\Factory
 */
class IndexState
{
    /** @var string Имя колонки. */
    protected string $column;
    /** @var int Стартовый индекс. */
    protected int $index;

    /**
     * @param string $column
     * @param int $index
     */
    public function __construct(string $column, int $index)
    {
        --$index;

        if ($index < 0) {
            $index = 0;
        }

        $this->column = $column;
        $this->index = $index;
    }

    /**
     * @param array $arguments
     * @return array
     */
    public function __invoke(array $arguments): array
    {
        return [
            $this->column => ++$this->index,
        ];
    }
}

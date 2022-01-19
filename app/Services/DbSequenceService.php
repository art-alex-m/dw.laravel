<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/**
 * Class DbSequenceService.
 *
 * @package App\Services
 */
class DbSequenceService
{
    /**
     * Устанавливает последовательность для поля на максимальное значение.
     *
     * @param string $table
     * @param string $field
     */
    public function setMax(string $table, string $field = 'id')
    {
        $sql = sprintf(
            'SELECT pg_catalog.setval(pg_get_serial_sequence(\'%1$s\', \'%2$s\'), MAX(%2$s)) FROM %1$s',
            $table,
            $field
        );

        DB::statement($sql);
    }
}

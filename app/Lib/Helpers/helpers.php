<?php

if (!function_exists('routeIs')) {
    /**
     * Проверяет, что генерируемый роут соответствует полученному запросу
     *
     * @param string $routeName
     * @param ...$parameters
     *
     * @return bool
     */
    function routeIs(string $routeName, ...$parameters): bool
    {
        $url = route($routeName, $parameters, false);
        $current = request()->getPathInfo();

        return $url == $current;
    }
}
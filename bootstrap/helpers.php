<?php

if (!function_exists('ui')) {
    /**
     * Возвращает настройки интерфейса.
     *
     * @return stdClass
     */
    function ui(): stdClass
    {
        return Context::get('ui') ?? literal(
            color: config('app.color'),
            drawer: true,
            dark: false,
        );
    }
}


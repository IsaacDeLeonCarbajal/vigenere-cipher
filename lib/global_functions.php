<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/config.php';

function dd(...$values)
{
    foreach ($values as $value) {
        echo '<pre>' . json_encode($value) . '</pre>';
        echo '<hr>';
    }

    die();
}

function url(string $route)
{
    return HOST_NAME . '/' . $route;
}

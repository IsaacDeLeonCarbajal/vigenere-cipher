<?php

function dd(...$values)
{
    foreach ($values as $value) {
        echo '<pre>' . json_encode($value) . '</pre>';
        echo '<hr>';
    }

    die();
}

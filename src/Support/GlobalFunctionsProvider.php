<?php

namespace Vigenere\Support;


class GlobalFunctionsProvider
{

    public function __invoke()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/global_functions.php';
    }
}

<?php

namespace Vigenere\Support;


class GlobalFunctionsProvider
{

    public function __invoke()
    {
        require_once 'lib/global_functions.php';
    }
}

<?php

require 'vendor/autoload.php';

use Vigenere\Support\GlobalFunctionsProvider;
use Vigenere\VigenereCipher;

(new GlobalFunctionsProvider)(); // Register helper functions

$obj = new VigenereCipher(
    transform: fn ($v) => strtoupper($v),
);

echo $obj->encrypt('VERSAILLES', 'CHEESE');

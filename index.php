<?php

require 'vendor/autoload.php';
require 'lib/config.php';

use Vigenere\VigenereCipher;

$cipher = new VigenereCipher(
    'CHEESE',
    transform: fn ($v) => strtoupper($v),
);

echo $cipher->encrypt('VERSAILLES');

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Vigenere\Support\GlobalFunctionsProvider;

(new GlobalFunctionsProvider)(); // Register helper functions

define('HOST_NAME', 'https://vigenere-cipher.com');

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/config.php';

use Vigenere\VigenereCipher;

$encryptedText = $_POST['encrypted_text'] ?? '###';
$key = strtoupper($_POST['key']);

$cipher = new VigenereCipher(
    $key,
    transform: fn ($v) => strtoupper($v),
);

echo json_encode([
    'data' => $cipher->decrypt($encryptedText),
]);

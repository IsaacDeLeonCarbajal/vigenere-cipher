<?php

require 'vendor/autoload.php';
require 'lib/config.php';

use Vigenere\VigenereCipher;

$cipher = new VigenereCipher(
    'CHEESE',
    transform: fn ($v) => strtoupper($v),
);

echo $cipher->encrypt('VERSAILLES');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    <main class="my-5 container">
        <h1 class="mb-5">Vigénere Cipher</h1>

        <div class="d-flex justify-content-between">
            <div class="col-4 col-md-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Plain text">
                    <button class="btn btn-outline-primary" type="button">Encrypt</button>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Encrypted text">
                    <button class="btn btn-outline-primary" type="button">Decrypt</button>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <input type="text" class="form-control" placeholder="Decrypted text">
            </div>
        </div>
    </main>

    <script src="bootstrap/css/bootstrap.min.js"></script>
</body>

</html>

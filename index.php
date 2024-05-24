<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="my-5 container">
        <h1 class="mb-5">Vigénere Cipher</h1>

        <div class="d-flex justify-content-between">
            <div class="col-4 col-md-3">
                <div class="input-group mb-3">
                    <input id="plain-text-input" type="text" class="form-control" placeholder="Plain text">
                    <button class="btn btn-outline-primary" type="button" onclick="requestEncryption(document.getElementById('plain-text-input').value)">Encrypt</button>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <div class="input-group mb-3">
                    <input id="encrypted-text-input" type="text" class="form-control" placeholder="Encrypted text">
                    <button class="btn btn-outline-primary" type="button" onclick="requestDecryption(document.getElementById('encrypted-text-input').value)">Decrypt</button>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <input id="decrypted-text-input" type="text" class="form-control" placeholder="Decrypted text">
            </div>
        </div>

        <div class="d-flex justify-content-start">
            <div class="col-4 col-md-3">
                <input id="key-text-input" type="text" class="form-control" placeholder="Key">
            </div>
        </div>
    </main>

    <script>
        const requestEncryption = (plainText) => {
            let key = getKey();

            if (!key) {
                alert('You need a key to make any operation');
                return;
            }

            fetch('<?= url("src/encrypt.php") ?>', {
                    method: 'POST',
                    body: createFormData({
                        plain_text: plainText,
                        key: key,
                    }),
                })
                .then(response => response.json())
                .then((data) => {
                    document.getElementById('encrypted-text-input').value = data.data;
                })
        }

        const requestDecryption = (encryptedText) => {
            let key = getKey();

            if (!key) {
                alert('You need a key to make any operation');
                return;
            }

            fetch('<?= url("src/decrypt.php") ?>', {
                    method: 'POST',
                    body: createFormData({
                        encrypted_text: encryptedText,
                        key: key,
                    }),
                })
                .then(response => response.json())
                .then((data) => {
                    document.getElementById('decrypted-text-input').value = data.data;
                })
        }

        const getKey = () => {
            return document.getElementById('key-text-input').value || null;
        }

        const createFormData = (data) => {
            const formData = new FormData();

            for (const key in data) {
                formData.append(key, data[key]);
            }

            return formData;
        }
    </script>
</body>

</html>

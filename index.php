<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/config.php';
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
                    <input id="plain-text-input" type="text" class="form-control" placeholder="Plain text">
                    <button class="btn btn-outline-primary" type="button" onclick="requestEncryption(document.getElementById('plain-text-input').value)">Encrypt</button>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <div class="input-group mb-3">
                    <input id="encrypted-text-input" type="text" class="form-control" placeholder="Encrypted text">
                    <button class="btn btn-outline-primary" type="button">Decrypt</button>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <input id="decrypted-text-input" type="text" class="form-control" placeholder="Decrypted text">
            </div>
        </div>
    </main>

    <script src="bootstrap/css/bootstrap.min.js"></script>

    <script>
        const requestEncryption = (plainText) => {
            fetch('<?= url("src/encrypt.php") ?>', {
                    method: 'POST',
                    body: createFormData({
                        plain_text: plainText,
                    }),
                })
                .then(response => response.json())
                .then((data) => {
                    document.getElementById('encrypted-text-input').value = data.data;
                })
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

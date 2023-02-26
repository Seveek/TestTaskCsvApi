<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Тестовое задание</title>

    <style>
        .custom-file-input.selected:lang(en)::after {
            content: "" !important;
        }

        .custom-file {
            overflow: hidden;
        }

        .custom-file-input {
            white-space: nowrap;
        }
    </style>
</head>

<body>
<div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="file">
                <label class="custom-file-label" for="customFileInput">Выберите файл</label>
            </div>
            <div class="input-group-append">
                <input type="submit" name="submit" value="Загрузить" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<div class="container">
    <form action="mailing.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="input-group-append">
                <input type="submit" name="mailing" value="Mailing" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
</body>
</html>
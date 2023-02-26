<?php
// подключаем файл конфигурации базы данных mysql
include_once 'db.php';

if (isset($_POST['submit']))
{
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
        $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
        while (($getData = fgetcsv($csvFile)) !== FALSE)
        {
            $number = $getData[0];
            $name = $getData[1];
            mysqli_query($conn, "INSERT INTO users (number, name) VALUES ('" . $number . "', '" . $name . "')");
        }
        fclose($csvFile);
        header("Location: index.php");
    }
    else
    {
        echo "Пожалуйста, выберите корректный файл";
    }
}
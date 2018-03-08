<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["doc"]) && $_FILES["doc"]["error"] == 0) {
        $fileName = $_FILES["doc"]["name"];
        $fileSize = $_FILES["doc"]["size"];
        $folderPath = $_ENV['FOLDER_PATH'];

        $maxsize = $_ENV['MAX_FILE_SIZE'] * 1024 * 1024;
        if ($fileSize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        if (file_exists($folderPath.$fileName)) {
            echo "$fileName is already exists.";
        } else {
            move_uploaded_file($_FILES["doc"]["tmp_name"], $folderPath . $fileName);
            echo "Your file was uploaded successfully. <br><a href='#' onclick='window.history.back();'>Back</a>";
        }
    } else {
        echo "Error: " . $_FILES["doc"]["error"];
    }
}

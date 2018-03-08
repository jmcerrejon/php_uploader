<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["doc"]) && $_FILES["doc"]["error"] == 0) {
        $filename = $_FILES["doc"]["name"];
        $filetype = $_FILES["doc"]["type"];
        $filesize = $_FILES["doc"]["size"];

        $maxsize = $_ENV['MAX_FILE_SIZE'] * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Check whether file exists before uploading it
        if (file_exists("storage/" . $_FILES["doc"]["name"])) {
            echo $_FILES["doc"]["name"] . " is already exists.";
        } else {
            move_uploaded_file($_FILES["doc"]["tmp_name"], "storage/" . $_FILES["doc"]["name"]);
            echo "Your file was uploaded successfully. <br><a href='#' onclick='window.history.back();'>Back</a>";
        }
    } else {
        echo "Error: " . $_FILES["doc"]["error"];
    }
}

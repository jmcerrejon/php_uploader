<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["doc"]) && $_FILES["doc"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["doc"]["name"];
        $filetype = $_FILES["doc"]["type"];
        $filesize = $_FILES["doc"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("storage/" . $_FILES["doc"]["name"])) {
                echo $_FILES["doc"]["name"] . " is already exists.";
            } else {
                move_uploaded_file($_FILES["doc"]["tmp_name"], "storage/" . $_FILES["doc"]["name"]);
                echo "Your file was uploaded successfully.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["doc"]["error"];
    }
}

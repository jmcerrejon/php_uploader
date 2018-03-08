<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
session_start();

if (!isset($_SESSION['user'])) {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php $_ENV['APP_NAME'] ?></title>
</head>
<body>
    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="fileSelect">Filename:</label>
            <input type="file" name="doc" id="fileSelect">
        </div>
        <div>
            <input type="submit" name="submit" value="Upload">
            <a href='logout.php'> Logout </a>
        </div>
        <div>
            <p><strong>Note:</strong>Max file size on server: <?php echo ini_get('post_max_size') ?>. Max file size configured to <?php echo $_ENV['MAX_FILE_SIZE'] ?>M.</p>
        </div>
    </form>
</body>
</html>
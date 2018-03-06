<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php $_ENV['APP_NAME']?></title>
</head>
<body>
    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <h2><?php echo $_ENV['APP_NAME'] ?></h2>
        <div>
            <label for="fileSelect">Filename:</label>
            <input type="file" name="doc" id="fileSelect">
        </div>
        <div>
            <input type="submit" name="submit" value="Upload">
        </div>
        <div>
            <p><strong>Note:</strong>Allowed max size of <?php echo ini_get('post_max_size') ?>.</p>
        </div>
    </form>
</body>
</html>

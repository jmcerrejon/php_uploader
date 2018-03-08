<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if (isset($_SESSION['user'])) {
    header("Location:home.php");
}

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    if ($user == $_ENV['APP_USER'] && $password == $_ENV['APP_PASSWORD']) {
        $_SESSION['user'] = $user;
        echo '<script type="text/javascript"> window.open("home.php","_self");</script>';
    } else {
        echo "Invalid user name or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php $_ENV['APP_NAME'] ?></title>
</head>
<body>
    <h2><?php echo $_ENV['APP_NAME'] ?></h2>
    <form action="" method="post">
        <div>
            <label for="user">User name:</label>
            <input type="text" name="user" id="user" />
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
        </div>
        <div>
            <input type="submit" name="login" value="Check" />
        </div>
    </form>
</body>
</html>

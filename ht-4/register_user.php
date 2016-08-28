<?php

session_start();
header('Content-Type: text/html; charset=utf-8');

define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "");
define("DB_USER", "ht-4");

$login = strip_tags(filter_input(INPUT_POST, "login"));
$pwd = strip_tags(filter_input(INPUT_POST, "pwd"));
$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$about = strip_tags(filter_input(INPUT_POST, "about"));

$error = "";

if (!$login) {
    $error .= "Некорректно задано имя <br>";
}
if (!$pwd) {
    $error .= "Некорректно задан пароль <br>";
}
if (!$age) {
    $error .= "Некорректно задан возраст <br>";
}
if (!$about) {
    $error .= "Некорректно заполнено поле \"О СЕБЕ\" <br>";
}

function user_exists($name, $conn) {
    if (!$name) {
        return false;
    }
    $query = "SELECT * FROM `user` WHERE `NAME` = '$name'";
    $num_rows = mysqli_num_rows($conn->query($query));
    if ($num_rows > 0) {
        return true;
    }
    else {
        return false;
    }
}

if ($error == "") {
    $conn = new mysqli(HOST, USER, PWD, DB_USER);

    if (user_exists($login, $conn)) {
        echo "Пользователь $login существует<br>";
    }
    else {
        $conn->query("INSERT INTO user (name, pwd, age, note)"
                . "VALUES ('$login', '$pwd', '$age', '$about')");
    }
    $conn->close();
    $_SESSION["name"] = $login;
    header("Location: http://hometasks/ht-4/view_photos.php");
    exit;
}
else {
    echo $error;
}

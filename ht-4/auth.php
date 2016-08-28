<?php

header('Content-Type: text/html; charset=utf-8');

define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "");
define("DB", "ht-4");

$login = strip_tags(filter_input(INPUT_POST, "login"));
$pwd = strip_tags(filter_input(INPUT_POST, "pwd"));

$error = "";

if (!$login) {
    $error .= "Некорректно задано имя <br>";
}
if (!$pwd) {
    $error .= "Некорректно задан пароль <br>";
}

function check_login_and_pwd($login, $pwd, $conn) {
    if (!$login || !$pwd) {
        return false;
    }
    $query = "SELECT * FROM `user` "
            . "WHERE `NAME` = '$login'"
            . "AND `PWD` = '$pwd'";
    $num_rows = mysqli_num_rows($conn->query($query));
    if ($num_rows > 0) {
        return true;
    }
    else {
        return false;
    }
}

if ($error == "") {
    $conn = new mysqli(HOST, USER, PWD, DB);
    $user_exists = check_login_and_pwd($login, $pwd, $conn);
    if ($user_exists == 1) {
        session_start();
        $_SESSION["name"] = $login;
        $_SESSION["msg"] = "";
        $conn->close();
        header("Location: http://hometasks/ht-4/view_photos.php");
        exit;
    }
    else {
        $conn->close();
        header("Location: http://hometasks/ht-4/auth_error.php");
        exit;
    }
}
else {
    echo $error;
}
//exit;

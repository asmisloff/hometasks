<?php

session_start();
header('Content-Type: text/html; charset=utf-8');

$user_name = $_SESSION["name"];
if ($user_name == "") {
    session_abort();
    header("Location: http://hometasks/ht-4/auth_error.php");
    exit;
}

define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "");
define("DB", "ht-4");

function is_image($file) {
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        return true;
    }
    else {
        return false;
    }
}

$file = $_FILES["pic"];
if (!is_image($file)) {
    echo "Попытка загрузить файл, не являющийся изображением<br>";
}
else {
    $uploaded = move_uploaded_file($file["tmp_name"], "./photos/" . $file["name"]);
    if (!$uploaded) {
        echo "Не удалось загрузить фотографию";
    }
    else {
        $filename = $file["name"];
        $conn = new mysqli(HOST, USER, PWD, DB);
        $conn->query("INSERT INTO `photos` (name, filename)"
                . "VALUES ('$user_name', '$filename')");
        $conn->close();
        header("Location: http://hometasks/ht-4/view_photos.php");
    }
}
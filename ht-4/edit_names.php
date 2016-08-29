<?php

session_start();

function endsWith($str, $sub) {
    return ( substr($str, strlen($str) - strlen($sub)) === $sub );
}

$new_names = $_POST;
$old_names = $_SESSION["photos_for_renaming"];

define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "");
define("DB", "ht-4");
$cn = new mysqli(HOST, USER, PWD, DB);
foreach ($new_names as $key => $value) {
    $old_name = $old_names[$key];
    $new_name = $new_names[$key];
    if ($new_name != "") {
        if (!endsWith($new_name, ".jpg")) {
            $new_name .= ".jpg";
        }
        $is_renamed = rename("./photos/$old_name", "./photos/$new_name");
        if ($is_renamed) {
            $query = "UPDATE `photos` SET `FILENAME` = '$new_name' WHERE `FILENAME` = '$old_name'";
            $cn->query($query);
            echo "$old_name переименован в $new_name";
        }
    }
}
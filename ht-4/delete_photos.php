<?php

session_start();
$filenames = [];
foreach ($_SESSION["photos_for_deletion"] as $filename) {
    array_push($filenames, $filename);
}

define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "");
define("DB", "ht-4");

$cn = new mysqli(HOST, USER, PWD, DB);
foreach ($_POST as $key => $value) {
    $f = $filenames[$key];
    $query = "DELETE FROM `photos` WHERE `filename` = '$f'";
    //chmod("./photos/$f", 0755);
    $deleted = unlink("./photos/$f");
    if ($deleted) {
	$cn->query($query);
	echo "$f удален <br>";
    }
}
$cn->close();

echo '<a href="./index.html"> На главную </a>';
?>

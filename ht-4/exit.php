<?php
session_start();
$user_name = $_SESSION["name"];
$_SESSION["name"] = "";
session_write_close();
echo "$user_name вышел <br>";
echo "<a href=./index.html> На главную </a>";
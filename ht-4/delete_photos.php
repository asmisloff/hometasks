<?php

session_start();
print_r($_POST);
echo "<br>";
print_r($_SESSION["photos_for_deletion"]);


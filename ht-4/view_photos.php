<?php
session_start();

function print_photos() {
    $files = scandir("./photos");
    echo "<ul>";
    foreach (array_slice($files, 2) as $file) {
        echo "<li> <a href='photos/$file'> $file </a> </li>";
    }
    echo "</ul>";
}

if ($_SESSION["name"] == "") {
    echo "Вы не авторизованы, ";
    echo "<a href='auth_form.php'> авторизуйтесь </a>";
    echo "или <a href='./register_user_form.php'> зарегистрируйтесь </a> ";
}
else {
    echo "Добро пожаловать, $_SESSION[name]";
    print_photos();
}
echo '<br><a href="./index.html"> На главную </a>';

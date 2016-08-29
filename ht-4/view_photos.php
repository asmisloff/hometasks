<?php

session_start();
?>
<style>
  img {
      height: 300px;
      padding: 10px;
      float: left;
  }
  div {
      overflow: auto;
      overflow-x: hidden;
      overflow-y: hidden;
  }
</style>
<?php

function print_photos() {
    $files = scandir("./photos");
    foreach (array_slice($files, 2) as $file) {
        echo "<a href='photos/$file'> <img src='photos/$file'> </a>";
    }
}

if ($_SESSION["name"] == "") {
    echo "Вы не авторизованы, ";
    echo "<a href='auth_form.php'> авторизуйтесь </a>";
    echo "или <a href='./register_user_form.php'> зарегистрируйтесь </a> ";
}
else {
    echo "Добро пожаловать, $_SESSION[name]";
    echo "<div>";
    print_photos();
    echo "</div>";
}
echo '<div> <a href="./index.html"> На главную </a> </div>';
?>
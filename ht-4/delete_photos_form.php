<?php session_start(); ?>
<html>
  <style>
    img {
        width: 300px;
    }
  </style>
  <body>
    <a href="./index.html"> На главную </a>
    <form action="delete_photos.php" method="post">
      <table>
          <?php
          define("HOST", "127.0.0.1");
          define("USER", "root");
          define("PWD", "");
          define("DB", "ht-4");

          function print_row($n, $filename) {
              echo "<tr> <td>"
              . "<img src=\"./photos/$filename\"> </td>"
              . "<td> <input type='checkbox' name='$n'> </td> </tr>";
          }

          function get_photo_list($username) {
              $filenames = [];
              $cn = new mysqli(HOST, USER, PWD, DB);
              $query = "SELECT `filename` FROM `photos` "
                      . "WHERE `NAME` = '$username'";
              $res = $cn->query($query);
              while ($row = mysqli_fetch_row($res)) {
                  array_push($filenames, $row[0]);
              }
              return $filenames;
          }

          $photo_list = get_photo_list($_SESSION["name"]);
          if (count($photo_list) == 0) {
              echo "<br> У вас нет своих фотографий, а чужие удалять нельзя.";
          }
          else {
              for ($n = 0; $n < count($photo_list); $n++) {
                  print_row($n, $photo_list[$n]);
              }
          }
          $_SESSION["photos_for_deletion"] = $photo_list;
          ?>
      </table>
      <?php
      if (count($photo_list) != 0) {
          echo '<input type="submit" value="Удалить выбранные">';
      }
      ?>
    </form>
  </body>
</html>

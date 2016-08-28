<?php session_start(); ?>
<html>
  <style>
    img {
        width: 300px;
    }
  </style>
  <body>
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
              . "<td> <input type='checkbox' name='cb-$n'> </td> </tr>";
          }

          function get_photo_list($username) {
              $filenames = [];
              $cn = new mysqli(HOST, USER, PWD, DB);
              $query = "SELECT `filename` FROM `photos` "
                      . "WHERE `NAME` = '$username'";
              $res = $cn->query($query);
              while ($row = mysqli_fetch_row($res)) {
                  array_push($filenames, $row);
              }
              return $filenames;
          }

          $n = 0;
          $photo_list = get_photo_list($_SESSION["name"]);
          foreach ($photo_list as $arr) {
              print_row($n++, $arr[0]);
          }
          $_SESSION["photos_for_deletion"] = $photo_list;
          ?>
      </table>
      <input type="submit" value="Удалить выбранные">
    </form>
  </body>
</html>
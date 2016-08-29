<?php session_start(); ?>
<html>
  <style>
    img {
        width: 300px;
    }
  </style>
  <body>
      <?php

      function print_row($n, $filename) {
          echo "<tr> <td>"
          . "<img src=\"./photos/$filename\"> </td>"
          . "<td> -- $filename -- </td>"
          . "<td> <input type='text' name='$n'> </td> </tr>";
      }

      function get_photo_list($username) {
          define("HOST", "127.0.0.1");
          define("USER", "root");
          define("PWD", "");
          define("DB", "ht-4");
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
      ?>
    <form action="edit_names.php" method="post">
      <table>
          <?php
          $photo_list = get_photo_list($_SESSION["name"]);
          for ($i = 0; $i < count($photo_list); $i++) {
              print_row($i, $photo_list[$i]);
          }
          $_SESSION["photos_for_renaming"] = $photo_list;
          ?>
      </table>
      <input type="submit" value="Переименовать">
    </form>
  </body>
</html>
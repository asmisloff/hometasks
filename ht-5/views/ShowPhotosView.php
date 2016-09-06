<html>
  <style>
    img {
        max-height: 200px;
    }
  </style>
  <body>
      <?php
      foreach ($PHOTOS as $photo) {
          echo "<img src = './photos/$photo' alt = '$photo'>";
      }
      ?>
  </body>
</html>

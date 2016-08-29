<html>
  <meta charset="utf-8">
  <body>
    <a href="./index.html"> На главную </a>
    <form action="./upload_photo.php"
          method="post"
          enctype="multipart/form-data">
      <table>
        <tr>
          <td>Загрузить файл</td>
          <td>
            <input type="file" name="pic" accept="image/*">
          </td>
        </tr>
      </table>
      <input type="submit" value="Загрузить">
    </form>
  </body>
</html>

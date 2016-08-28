<html>
  <meta charset="utf-8">
  <style>
    table td {
        padding: 10px;
    }
  </style>
  <body>

    <form action="./register_user.php" method="post">
      <table>
        <tr>
          <td> Имя: </td>
          <td> <input type="text" name="login"> </td>
        </tr>
        <tr>
          <td> Пароль: </td>
          <td> <input type="text" name="pwd"> </td>
        </tr>
        <tr>
          <td> Возраст: </td>
          <td> <input type="text" name="age"> </td>
        </tr>
        <tr>
          <td> О себе: </td>
          <td> <textarea name="about"></textarea> </td>
        </tr>
      </table>

      <input type="submit" value="Зарегистрироваться">
    </form>

  </body>
</html>
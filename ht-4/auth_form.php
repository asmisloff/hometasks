<html>
  <meta charset="utf-8">
  <style>
    table td {
        padding: 10px;
    }
  </style>
  <body>
    <form action="./auth.php" method="post">
      <table>
        <tr>
          <td> Имя: </td>
          <td> <input type="text" name="login"> </td>
        </tr>
        <tr>
          <td> Пароль: </td>
          <td> <input type="text" name="pwd"> </td>
        </tr>
      </table>

      <input type="submit" value="Войти">
    </form>

    <form action="./exit.php" method="post">
      <input type="submit" value="Выйти">
    </form>
  </body>
</html>

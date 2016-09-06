<style>
  td {
      text-align: center;
      padding: 10px;
      border-style: solid;
      border-color: #000;
      border-width: 1px;
  }
  tr#header {
      background-color: lightyellow;
  }
</style>

<?php

function showListOfUsers($lst) {
    echo "<table>";
    echo "<tr id='header'>";
    echo "<td> Имя </td>";
    echo "<td> Возраст </td>";
    echo "<td> О себе </td>";
    echo "<td> Совершеннолетний </td>";
    echo "</tr>";
    foreach ($lst as $user) {
        echo "<tr>";
        echo "<td> $user->Login </td>";
        echo "<td> $user->Age </td>";
        echo "<td> $user->About </td>";
        echo "<td> $user->Meta </td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

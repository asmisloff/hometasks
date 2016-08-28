<meta charset ="utf-8">
<html>
<?php
$login = "Алексей";
$age = 32;

$rem = $age % 10;
if ($age > 4 && $age < 20)
    $years = "лет";
elseif ($rem == 1)
    $years = "год";
elseif ($rem > 1 && $rem < 5)
    $years = "года";
else
    $years = "лет";

echo "Меня зовут $login <br>";
echo "Мне $age $years <br>";

echo "\"!|\\/'\"\\";
?>

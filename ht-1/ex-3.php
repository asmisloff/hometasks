<meta charset ="utf-8">
<?php
//eval("const VALUE = 14;");
const VALUE = 13;
//eval("const VALUE = 'Some-very-new-value';");
$defined_p = false;

if (defined("VALUE")) {
    $defined_p = true;
    echo "Константа <b> VALUE = " . VALUE . "</b> определена";
}
else
    echo "Константа VALUE <b> не </b> определена";

const VALUE = 15;
echo "<br>После попытки переопределения <b>VALUE = " . VALUE . "</b>";
?>

<p style="color: green;"> Почему PHP меня не обругал?
Отключен вывод ошибок или так и должно быть? </p>
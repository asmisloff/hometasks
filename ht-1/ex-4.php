<meta charset ="utf-8">
<?php
$age = 32;

if ($age >= 18 && $age <= 65)
    echo "Вам еще работать и работать.";
elseif ($age > 65)
    echo "Вам пора на пенсию.";
elseif ($age < 18 && $age >= 1)
    echo "Вам еще рано работать.";
else
    echo "Неизвестный возраст.";
?>
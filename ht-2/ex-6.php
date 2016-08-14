<?php

echo "Текущие дата и время: " . date("d.m.y H:i");
$time = "24.02.2016 00:00:00";
echo "<br>Unix time для $time: " . strtotime("$time");
echo "<br> Проверка: " . strtotime("$time") .
        " -> " . date("d.m.y H:i:s", strtotime($time));
<?php

function print_file_content($file_name) {
    $fh = @fopen($file_name, "r");
    if ($fh) {
        while ($line = fgets($fh)) {
            echo "$line <br>";
        }
        if (!feof($fh)) {
            echo "Неизвестная ошибка. Файл не прочитан до конца.";
        }
    fclose($fh);
    }
    else {
        echo "Ошибка: не удалось открыть файл \"$file_name\"";
    }
}

//test
print_file_content(dirname(__FILE__) . "/test.txt");
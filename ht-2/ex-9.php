<?php

function write_to_file($filename, $s) {
    $handle = @fopen($filename, "w");
    if ($handle) {
        if (fwrite($handle, $s)) {
            echo "Данные записаны в " . realpath($filename);
            fclose($handle);
            return true;
        }
        else {
            echo "Ошибка записи в файл";
            fclose($handle);
            return false;
        }
    }
    else {
        echo "Ошибка доступа к файлу";
        fclose($handle);
        return false;
    }
}

//test
write_to_file("./another_hello.txt", "Hello again.");

<?php

function to_1251($str) {
    return iconv("utf-8", "cp1251", $str);
}

function to_utf_8($str) {
    return iconv("cp1251", "utf-8", $str);
}

function is_palindrome($s) {
//    $s must be in single byte coding
    $ls = strtolower($s);
    $len = strlen($ls);
    $i = 0; $j = $len - 1;
    while ($i < $j) {
        while (!ctype_alnum($ls[$i])) {
            $i++;
        }
        while (!ctype_alnum($ls[$j])) {
            $j--;
        }
        if ($ls[$i] != $ls[$j]) {
            return false;
        }
        $i++;
        $j--;
    }
    return true;
}

function check_the_string($s) {
    $res = is_palindrome(to_1251($s));
    if ($res) {
        echo "Строка \"$s\" - палиндром. <br>";
    }
    else {
        echo "Строка \"$s\" - <b> не </b> палиндром. <br>";
    }
}

/* ------------------------------------------------------------------------------------ */
/* ----------------------------------------test---------------------------------------- */
/* ------------------------------------------------------------------------------------ */
//check_the_string("аб, Б А!!");
//check_the_string("АБWБВ");
//check_the_string("Я иду с мечем судия");
//check_the_string("А роза упала на лапу Азора");
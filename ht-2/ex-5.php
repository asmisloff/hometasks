<?php

function to_1251($str) {
    return iconv("utf-8", "cp1251", $str);
}

function to_utf_8($str) {
    return iconv("cp1251", "utf-8", $str);
}

function str_to_arr($s) {
    $arr = str_split(to_1251($s));
    setlocale(LC_ALL, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');
    
    $res_arr = array_map(
                    function($ch) {
                        return strtolower($ch);
                    },
                    array_filter(
                        $arr,
                        function($ch) {
                            return ctype_alnum($ch);
                        }));
    array_splice($res_arr, 0, 0);
    return $res_arr;
}

function is_palindrome($s) {
    $ar = str_to_arr($s);
    $rar = array_reverse($ar);
    for ($i = 0; $i < count($ar); $i++) {
        if (strcmp($ar[$i], $rar[$i]) != 0) {
            return false;
        }
    }
    return true;
}

function check_the_string($s) {
    $res = is_palindrome($s);
    if ($res) {
        echo "Строка $s - палиндром. <br>";
    }
    else {
        echo "Строка $s - <b> не </b> палиндром. <br>";
    }
}

/* ------------------------------------------------------------------------------------ */
/* ----------------------------------------test---------------------------------------- */
/* ------------------------------------------------------------------------------------ */
//check_the_string("аб, Б А!!");
//check_the_string("АБWБВ");
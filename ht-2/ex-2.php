<meta charset="utf-8">
<?php

$operators = [
    "+" => function($x, $y) {return $x + $y;},
    "-" => function($x, $y) {return $x - $y;},
    "/" => function($x, $y) {return $x / $y;},
    "*" => function($x, $y) {return $x * $y;},
    "**" => function($x, $y) {return pow($x, $y);},
];

function apply($op, $arg1, $arg2) {
    global $operators;
    $err_msg = "APPLY -- неизвестный оператор -- '$op' <br>";
    if (array_key_exists($op, $operators)) {
        $proc = $operators[$op];
        return $proc($arg1, $arg2);
    } 
    else {
        return $err_msg;
    } 
}

function reduce($arr, $op, $initial_value) {
    $err_msg = "REDUCE -- не числовой элемент во входном массиве -- '$num' <br>";
    foreach ($arr as $num) {
        $initial_value = apply($op, $initial_value, $num);
	if (is_string($initial_value)) {
	    return $initial_value;
	}
	if (!is_numeric($num)) {
            return $err_msg;
        }
    }
    return $initial_value;
}

$test = [1, 2, 3, 4, 5, 6, 8];
echo $acc = reduce($test, "**", 0.99999);

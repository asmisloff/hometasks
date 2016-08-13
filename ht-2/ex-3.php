<meta charset="utf-8">
<?php

$OPERATORS = [
    "+" => function($x, $y) {return $x + $y;},
    "-" => function($x, $y) {return $x - $y;},
    "/" => function($x, $y) {return $x / $y;},
    "*" => function($x, $y) {return $x * $y;},
    "**" => function($x, $y) {return pow($x, $y);},
];

function apply($op, $arg1, $arg2) {
    global $OPERATORS;
    $err_msg = "APPLY -- неизвестный оператор -- '$op' <br>";
    if (array_key_exists($op, $OPERATORS)) {
        $proc = $OPERATORS[$op];
        return $proc($arg1, $arg2);
    } 
    else {
        return $err_msg;
    } 
}

function reduce($op, ...$numbers) {
    $err_msg = "REDUCE -- не числовой элемент во входном массиве -- '$num' <br>";
    $initial_value = $numbers[0];
    foreach (array_slice($numbers, 1) as $num) {
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

/*------------------------------------------------------------------------------------*/
/*----------------------------------------test----------------------------------------*/
/*------------------------------------------------------------------------------------*/
echo $acc = reduce("/", 1, 2, 3, 4, 5.2);

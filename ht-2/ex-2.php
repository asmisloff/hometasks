<meta charset="utf-8">
<?php

$operators = [
    "+" => function($x, $y) {return $x + $y;},
    "-" => function($x, $y) {return $x - $y;},
    "/" => function($x, $y) {return $x / $y;},
    "*" => function($x, $y) {return $x * $y;}
];

$arr = [1, 2, 3, 4, 5];

function apply($op, $arg1, $arg2) {
    global $operators;
    if (array_key_exists($op, $operators)) {
        $proc = $operators[$op];
        return $proc($arg1, $arg2);
    } 
    else {
        return NULL;
    }
        
}

function reduce($arr, $op, $initial_value) {
    foreach ($arr as $num) {
	$initial_value = apply($op, $initial_value, $num);
    }
    return $initial_value;
}

$test = [1, 2, 3, 4, 5, 6, 7];
$acc = reduce($test, "/", 1);
if ($acc) {
    echo $acc;
}
else {
    echo "В reduce передан неизвестный оператор";
}

<meta charset ="utf-8">
<?php
$bmw = ["model" => "X5",
	"speed" => "120",
	"doors" => 5,
	"year" => 2015];

$toyota = ["model" => "Camry",
           "speed" => "120",
           "doors" => 5,
           "year" => 2016];

$opel = ["model" => "Astra",
         "speed" => "120",
         "doors" => 5,
         "year" => 2017];

$triple_array = ["bmw" => &$bmw,
                 "toyota" => &$toyota,
                 "opel" => &$opel];

function dump_array($arr) {
    foreach ($arr as $key => $value) {
	echo "CAR $key <br>";
	foreach ($value as $v)
	echo "$v ";
	echo "<br> <br>";
    }
}

dump_array($triple_array);

?>

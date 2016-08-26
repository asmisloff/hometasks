<?php
include_once("ex-1.php");

function make_array($n) {
    $a = [];
    for ($i = 0; $i < $n; $i++) {
	$a[$i] = rand(0, $n);
    }
    return $a;
}

function write_csv($filename, $data) {
    $handle = fopen($filename, 'w');
    if ($handle) {
	if (!fputcsv($handle, $data)) {
	    error("Error while writing csv data -- $filename");
	    fclose($handle);
	    return false;
	}
    } else {
	error("File open error -- $filename");
	fclose($handle);
	return false;
    }
    fclose($handle);
    return true;
}

function read_csv($filename) {
    $handle = fopen($filename, 'r');
    if ($handle) {
	$data = fgetcsv($handle);
	if (!$data) {
	    error("Error while writing csv data -- $filename");
	    return false;
	}
	return $data;
    } else {
	error("File open error -- $filename");
	return false;
    }
}

//test
/* $a = make_array(100);
 * pretty_print($a, "Исхдный массив");
 * write_csv("csv-test.csv", $a);
 * 
 * $data = read_csv("csv-test.csv");
 * pretty_print($data, "Массив, восстановленный из csv файла");
 * echo "Сумма четных чисел: " .
 *      array_reduce(array_filter($data,
 *  			       function($x) {
 *  				   return ($x % 2 == 0);
 *  			       }),
 *  		  function($x, $y) {
 *  		      return $x + $y;
 *  		  });*/

<?php

require_once("ex-1.php");

$data = to_array($xml);

function write_as_json($data, $fname, &$js = NULL) {
    $handle = fopen($fname, 'w');
    if ($handle) {
        $js = json_encode($data);
        fwrite($handle, $js);
        fclose($handle);
        return true;
    } else {
        echo "File open error -- $fname<br>";
        fclose($handle);
        return false;
    }
}

function read_json($fname, $assoc = false, $len = 1000) {
    $handle = fopen($fname, "r");
    if ($handle) {
        $object = json_decode(fread($handle, $len), $assoc);
        fclose($handle);
        return $object;
    } else {
        fclose($handle);
        return null;
    }
}

function json_diff($a1, $a2, $upper_keys = []) {

    $print_entry = function($str_upper_keys, $key, $a1, $a2) {
	if ($a1[$key] != $a2[$key]) {
	    echo "<b> $str_upper_keys => $a1[$key] ----- $a2[$key]</b><br>";
	}
    };

    foreach ($a1 as $key => $value) {
        if (is_array($value)) {
            $_upper_keys = array_slice($upper_keys, -1);
            array_push($_upper_keys, $key);
            json_diff($a1[$key], $a2[$key], $_upper_keys);
        }
        else {
            if ($upper_keys) {
                $str_upper_keys = implode("->", $upper_keys) . "->$key";
            } else {
                $str_upper_keys = $key;
            }
            $print_entry($str_upper_keys, $key, $a1, $a2);
        }
    }
}

write_as_json($data, "output.json");
$object = read_json("output.json");
$lot = rand(0, 1);
if ($lot == 0) {
    $object->Shipping->Name = "John Smith";
}
write_as_json($object, "output2.json");

$a1 = read_json("output.json", true);
$a2 = read_json("output2.json", true);

pretty_print($a1);
pretty_print($a2);
json_diff($a1, $a2

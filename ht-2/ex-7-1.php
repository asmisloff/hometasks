<?php

function print_smile() {
    echo   "████████████████████████████████████████
            <br>█████████████▀▀░░░░░░░░░░▀▀▀████████████
            <br>█████████▀▀░░░░░░░░░░░░░░░░░░░▀█████████
            <br>███████▀░░░░░░░░░░░░░░░░░░░░░░░░▀███████
            <br>█████▀░▄▄▄░░░░░░░░░░░░░░▄▄▄▄░░░░░░▀█████
            <br>████▀▄▀░░░██▄░░░░░░░░░▄▀░░░▄██▄░░░░░████
            <br>███▀█░░░░█████░░░░░░░█░░░░░█████░░░░░███
            <br>██▀░█░░░░░░░░█░░░░░░▄░░░░░░░░░░█░░░░░▀██
            <br>██░░█░░░░░░░░█░░░░░░▀▄░░░░░░░░░█░░░░░░██
            <br>██░░▀▀▀▀▀▀▀▀▀▀░░░░░░░▀▀▀▀▀▀▀▀▀▀▀░░░░░░██
            <br>██░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░██
            <br>██░░░▀█████████████████████████▄░░░░░░██
            <br>██▄░░░▀█████████████████████████░░░░░▄██
            <br>███▄░░░█████████████████████████░░░░░███
            <br>████▄░░░███████████▀▀▀▀▀▀██████░░░░░████
            <br>█████▄░░░▀███████▀░░░░░░░░░▀██░░░░▄█████
            <br>███████▄░░░▀████░░░░░░░░░░▄█▀░░░▄███████
            <br>█████████▄░░░▀▀█▄▄▄▄▄▄▄▄▀▀░░░░▄█████████
            <br>████████████▄▄▄░░░░░░░░░░▄▄▄████████████
            <br>████████████████████████████████████████<br>";
}

function parse_rx($s) {
    $network = "/RX packets:\d{4,}/";
    $smile = "/:\)/";
    if (preg_match($smile, $s)) {
        print_smile();
        return;
    }
    if (preg_match($network, $s) == 1) {
        echo "Сеть есть<br>";
        return;
    }
}

//test
//$s1 = "RX packets:950381 errors:0 dropped:0 overruns:0 frame:0";
//$s2 = "RX packets:950 errors:0 dropped::) overruns:0 frame:0";
//echo parse_rx($s1);
//echo parse_rx($s2);

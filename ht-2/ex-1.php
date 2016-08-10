<meta charset="utf-8">
<?php
function strings_to_paragraphs($ar, $flag) {
    $strings = "";
    foreach ($ar as $s) {
        $strings = $strings . "<p> $s </p>";
    }
    echo $strings;
    if ($flag) {
        return implode($ar, "");
    }
    else {
        return null;
    }
}

$test = ["Буря", "Мглою", "Небо", "кроет"];
echo strings_to_paragraphs($test, false);
echo strings_to_paragraphs($test, true);
?>

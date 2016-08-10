<?php
function strings_to_paragraphs($ar, $flag) {
    $strings = "";
    foreach ($ar as $s)
        $strings = $strings . "<p> $s </p>";
    if ($flag)
        return $strings;
}
?>


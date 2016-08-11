<meta charset ="utf-8">

<?php
$str = "Буря мглою небо кроет";
echo $str;
$exp_str = explode(" ", $str);
$i = 0;
$imp_str = "";
$rev_imp_str = "";
const DELIMITER = "-";

while ($i < count($exp_str)) {
    $imp_str = $imp_str . $exp_str[$i] . DELIMITER;
    $i++;
}

$i = count($exp_str);
while ($i-- > 0) {
    $rev_imp_str = $rev_imp_str . $exp_str[$i] . DELIMITER;
}

echo "<br> В прямом порядке: " . $imp_str = mb_substr($imp_str, 0, -1, "utf-8");
echo "<br>В обратном порядке: " . $rev_imp_str = mb_substr($rev_imp_str, 0, -1, "utf-8");

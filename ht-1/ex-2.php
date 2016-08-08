<meta charset ="utf-8">
<?php
$total_dwg = 80;
echo "На школьной выставке <b> \$total_dwg = $total_dwg </b> рисунков.";
$soft_tip_dwg = 23;
echo "<br> Из них фломастерами <b> \$soft_tip_dwg = $soft_tip_dwg </b> шт.";
$pencil_dwg = 40;
echo "<br> Карандашами выполнено <b> \$pencil_dwg = $pencil_dwg </b> рисунков.";
echo "<br> Сколько рисунков выполнено красками?";

echo "<br> ------------Решение и ответ-----------";
$solution_txt = '$paint_dwg = $total_dwg - $soft_tip_dwg - $pencil_dwg';
$solution = $paint_dwg = $total_dwg - $soft_tip_dwg - $pencil_dwg;
echo "<br> На школьной доске <b> $solution_txt = $solution </b> рисунков красками";
?>
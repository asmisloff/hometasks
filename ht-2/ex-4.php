<meta charset="utf-8">
<style>
 .header {
   font-weight: bold;
   text-align: center;
 }
 .data {
   text-align: center;
   padding: 0 10px 0 10px;
 }
</style>
<?php
function mul_table($rows, $cols) {
    if (!is_positive_int($rows)) {
	return [null, 'MUL_TABLE -- $rows is not integer --> ' . $rows];
    }
    if (!is_positive_int($cols)) {
	return [null, 'MUL_TABLE -- $cols is not integer --> ' . $cols];
    }
    $tbl = "<table id='mul_table'>";
    $tbl .= make_tbl_row(range(1, $cols), "header");
    for ($row = 1; $row <= $rows; $row++) {
	$tbl .=
	    make_tbl_row(
		array_map(
		    function($col) use ($row) {
			return $col * $row;
		    },
		    range(1, $cols)),
		"data",
		$row,
		"header");
    }
    $tbl .= "</table>";
    return $tbl;
}

function is_positive_int($n) {
    return is_int($n) && $n > 0;
}

function make_tbl_row(Array $data, $cls, $first_elt = "", $fe_cls = "") {
    $row = "";
    foreach ($data as $elt) {
	$row .= "<td class='$cls'> $elt </td>";
    }
    return "<tr> <td class='$fe_cls'> $first_elt </td> $row </tr>";
}

/*------------------------------------------------------------------------------------*/
/*----------------------------------------test----------------------------------------*/
/*------------------------------------------------------------------------------------*/
$tbl = mul_table(10, 10);
if (is_array($tbl)) {
    echo $tbl[1];
}
else {
    echo $tbl;
}
?>

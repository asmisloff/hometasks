<?php
header('Content-Type: text/html; charset=utf-8');

$xml_path = "./data.xml";
$xml = simplexml_load_file($xml_path);

function pretty_print($a) {
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

function to_array($elt) {
    $arr = [];
    foreach ($elt as $key => $value) {
        if ($value->count() > 1) {
            $att = (string)$value->attributes();
            if ($att != "") {
                $arr[$att] = to_array($value);
            }
            else {
                $arr[$key] = to_array($value);
            }
        }
        else {
            $arr[$key] = (string)$value;
        }
    }
    return $arr;
}

function print_array($arr, $header) {
    echo "<ul>$header";
    if (is_array($arr)) {
        foreach ($arr as $key => $value) {
            echo "<li>$key ----- <b>$value</b></li>";
        }
    }
    else {
        echo "<li>$arr</li>";
    }
    echo "</ul>";
}

$order_header = to_array($xml->attributes());
$order_details = to_array($xml);

//echo "<h2> Заказ № $order_header[PurchaseOrderNumber] "
//        . "от $order_header[OrderDate] </h2>";
//print_array($order_details["Shipping"], "Получатель");
//print_array($order_details["Billing"], "Отправитель");
//foreach ($order_details["Items"] as $part_number => $details) {
//    print_array($details, "Заказ № $part_number");
//}
//print_array($order_details["DeliveryNotes"], "Примечание");

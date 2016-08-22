<?php
include_once("ex-1.php");

$url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);

$title = [];
preg_match("/\"title\":[^\,]+/", $data, $title);
$page_id = [];
preg_match("/\"pageid\":[^\,]+/", $data, $page_id);
echo $title[0] . "<br>";
echo $page_id[0];
<?php
include_once('simple_html_dom.php');

$target_url = $_GET['site'];
$html = new simple_html_dom();
$html->load_file($target_url);
$arr = array();
foreach($html->find('a') as $link){
  array_push($arr, $link->href);
}

echo json_encode($arr);
?>
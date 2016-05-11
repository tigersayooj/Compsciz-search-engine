<script src="jquery.js"></script>
<script language="javascript">

function getCrawl(x)
{

$.get("json.php", {site:x}, function(data){

var ans = data;
var b = $("#output").html();

for(var y=0;y!=ans.length;y++)
{
b += "<a href='javascript:getCrawl(\""+ans[y]+"\")'>"+ans[y]+"</a><br />";
}

$("#output").html(b);

}, "json")

}

</script>

<div id="output">
<?php
include_once('simple_html_dom.php');
$url = isset($_GET['url']) ? $_GET['url'] : '';
$submit = isset($_GET['submit']) ? $_GET['submit'] : '';
$target_url = $url;
$html = new simple_html_dom();
$html->load_file($target_url);
foreach($html->find('a') as $element) 
       echo $element->href . '<br>';
?>

</div>

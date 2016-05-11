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
$link = $html->find('title');
if($link != NULL){
$link1 = file_get_html($url)->plaintext;
mysql_connect("localhost","root","");
mysql_select_db("semdb");
$link2 = $link[0]->plaintext;
$link1=mysql_real_escape_string($link1);
$link2=mysql_real_escape_string($link2);
$url=mysql_real_escape_string($url);
$sql="DELETE FROM sites WHERE link='$url'";
mysql_query($sql);
echo "Thank you!!!! ";
$submit=mysql_query("INSERT INTO sites (title,link,description) VALUES ('$link2','$url','$link1')");
$result = mysql_query($submit) or die();
}
else
{
echo "<br>unexpected error";
}
?>

</div>

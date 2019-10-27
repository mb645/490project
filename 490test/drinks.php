<?php
$whatdrink = $_GET["whatdrink"];


$url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=";
$url .= $whatdrink;

$fp = fopen($url, "r");
$contents = "";
while($more = fread($fp,1000)){$contents .= $more;}
echo $contents;
?>

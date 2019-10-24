<?php
$url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita";
$fp = fopen($url, "r");
$contents = "";
while($more = fread($fp,1000)){$contents .= $more;}
echo $contents;
?>

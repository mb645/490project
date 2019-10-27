<?php
//^^ #!/usr/bin/php
include ("myfunctions.php");




require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$flag = false;
$whatdrink = GET("whatdrink", $flag);
if ($flag) {exit("<br><br>empty input field");};


$request = array();
$request['type'] = "findDrink";
$request['whatdrink'] = $whatdrink;
$response = $client->send_request($request);
//$response = $client->publish($request);


if ($response == "marcinbrynczka")
{
	//$response = "VECTORGRAPHICS";
$url = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=";
//$whatdrink = str_replace(' ', '+', $whatdrink);
//$whatdrink = strtok($whatdrink, " ");
$url .= $whatdrink;

$fp = fopen($url, "r");
$contents = "";
while($more = fread($fp,1000)){$contents .= $more;}
$drinkdata = json_decode($contents, true);

$numresults = count($drinkdata['drinks']);
for($i=0;$i<$numresults;$i++){
$newdrink01 = $drinkdata['drinks'][$i]['strDrink'];
$newdrink02 = $drinkdata['drinks'][$i]['strGlass'];
$newdrink03 = $drinkdata['drinks'][$i]['strInstructions'];
$newdrink04 = $drinkdata['drinks'][$i]['strDrinkThumb'];
$newdrink05 = $drinkdata['drinks'][$i]['strIngredient1'];
$newdrink06 = $drinkdata['drinks'][$i]['strIngredient2'];
$newdrink07 = $drinkdata['drinks'][$i]['strIngredient3'];
$newdrink08 = $drinkdata['drinks'][$i]['strIngredient4'];
$newdrink09 = $drinkdata['drinks'][$i]['strIngredient5'];
$newdrink10 = $drinkdata['drinks'][$i]['strIngredient6'];
$newdrink11 = $drinkdata['drinks'][$i]['strIngredient7'];
$newdrink12 = $drinkdata['drinks'][$i]['strIngredient8'];
$newdrink13 = $drinkdata['drinks'][$i]['strIngredient9'];
$newdrink14 = $drinkdata['drinks'][$i]['strIngredient10'];
$newdrink15 = $drinkdata['drinks'][$i]['strIngredient11'];
$newdrink16 = $drinkdata['drinks'][$i]['strIngredient12'];
$newdrink17 = $drinkdata['drinks'][$i]['strIngredient13'];
$newdrink18 = $drinkdata['drinks'][$i]['strIngredient14'];
$newdrink19 = $drinkdata['drinks'][$i]['strIngredient15'];


$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}


$request = array();
$request['type'] = "newDrink";
$request['strDrink'] = $newdrink01;
$request['strGlass'] = $newdrink02;
$request['strInstructions'] = $newdrink03;
$request['strDrinkThumb'] = $newdrink04;
$request['strIngredient1'] = $newdrink05;
$request['strIngredient2'] = $newdrink06;
$request['strIngredient3'] = $newdrink07;
$request['strIngredient4'] = $newdrink08;
$request['strIngredient5'] = $newdrink09;
$request['strIngredient6'] = $newdrink10;
$request['strIngredient7'] = $newdrink11;
$request['strIngredient8'] = $newdrink12;
$request['strIngredient9'] = $newdrink13;
$request['strIngredient10'] = $newdrink14;
$request['strIngredient11'] = $newdrink15;
$request['strIngredient12'] = $newdrink16;
$request['strIngredient13'] = $newdrink17;
$request['strIngredient14'] = $newdrink18;
$request['strIngredient15'] = $newdrink19;


$response = $client->send_request($request);
}
echo "<br>drink not found. retrieved drink data from thecocktaildb.com api and added to database. try again.";
}
else{
print_r($response);}
?>

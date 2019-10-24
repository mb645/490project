<?php
//^^ #!/usr/bin/php
session_start();
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
$uname = GET("username", $flag);
$pword = GET("password", $flag);
if ($flag) {exit("<br><br>empty input field");};


$request = array();
$request['type'] = "login";
$request['username'] = $uname;
$request['password'] = $pword;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
print "<br><br>";

if (!$response)
{
	echo "incorrect username/password";
	exit();
}
if ($response)
{
        echo "login successful";
	$_SESSION['logged'] = true;
	$_SESSION['username'] = $uname;
	header("refresh:2; url = homepage.php");
}
echo "\n\n";
print "<br><br>";
echo $argv[0]." END".PHP_EOL;
exit();
?>

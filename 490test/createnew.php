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
$uname = GET("username", $flag);
$pword = GET("password", $flag);
$pword2 = GET("password2", $flag);
$email = GET("email", $flag);
if ($flag) {exit("<br><br>empty input field");};
if ($pword != $pword2){exit("<br><br>passwords do not match");};

$request = array();
$request['type'] = "createNew";
$request['username'] = $uname;
$request['password'] = $pword;
$request['email'] = $email;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "<br><br>";
echo "\n\n";
echo $argv[0]." END".PHP_EOL;
if (!$response)
{
echo "<br><br>username already taken";
}

if ($response)
{
echo "<br><b?r>try logging in";
header("refresh:3; url = login.html");
exit();
}

?>

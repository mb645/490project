#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');





function doLogin($username,$password)
{
    // lookup username in databas
	// check password
	// return true
    //return false if not valid

    $hostname = "localhost";
    $mname = "user1";
    $project = "490accounts";
    $mword = "user1";
    
    $db = mysqli_connect($hostname,$mname, $mword ,$project);
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "Successfully connected to MySQL ... ";

mysqli_select_db( $db, $project ); 
//global $t;
$s = "select * from accounts where username = '$username' and password = '$password'";
print "SQL select statement is: $s ... "; 
($t = mysqli_query ( $db,  $s   ) ); 
// or die ( mysqli_error ($db) );
$num = mysqli_num_rows($t);

if ($num < 1)
{
	//exit("wrong username/password");
	print "wrong username/password ... ";
	return false;
}

mysqli_close($db);
print "login successful ... ";
return true;

}



function createNew($username, $password, $email)
{
    $hostname = "localhost";
    $mname = "user1";
    $project = "490accounts";
    $mword = "user1";

   $db = mysqli_connect($hostname,$mname, $mword ,$project);
if (mysqli_connect_errno())
  {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
  }
print "Successfully connected to MySQL ... ";

mysqli_select_db( $db, $project );

$s = "select * from accounts where username = '$username'";
print "SQL select statement is: $s ... ";
($t = mysqli_query ( $db,  $s   ) ); 
//or die ( mysqli_error ($db) );
$num = mysqli_num_rows($t);

if ($num > 0)
{
	print "username taken ... ";
	return false;
}
else
{
	print "username not taken ... ";
}

$s = "insert into accounts values ('$username', '$password', '$email')";
print "SQL select statement is: $s ... ";
($t = mysqli_query ( $db,  $s   ) );
      //	or die ( mysqli_error ($db) );
print "new account created ... ";
mysqli_close($db);
return true;
}




function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
	    return doLogin($request['username'],$request['password']);
case "createNew":
	return createNew($request['username'],$request['password'],$request['email']);
    case "validate_session":
      return doValidate($request['sessionId']);
  } 
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;


$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>


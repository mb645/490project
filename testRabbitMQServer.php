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
//return true;
$test = "IT WORKS IT WORKS IT WORKS IT WORKS";
return $test;
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






function findDrink($whatdrink)
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
$s = "select * from drinks where strDrink like '%$whatdrink%'";
print "SQL select statement is: $s ... ";
($t = mysqli_query ( $db,  $s   ) );
//or die ( mysqli_error ($db) );
$num = mysqli_num_rows($t);
if ($num < 1)
{
	print "no drink ... ";
	return "marcinbrynczka";
}

mysqli_close($db);
print "drink found ... ";
//return true;

$sendback = "";
while ($r = mysqli_fetch_array ($t, MYSQLI_ASSOC))
{
	$strDrink = $r["strDrink"];
	$strInstructions = $r["strInstructions"];
	$strGlass = $r["strGlass"];
	$strDrinkThumb = $r["strDrinkThumb"];
	$strIngredient1 = $r["strIngredient1"];
	$strIngredient2 = $r["strIngredient2"];
	$strIngredient3 = $r["strIngredient3"];
	$strIngredient4 = $r["strIngredient4"];
	$strIngredient5 = $r["strIngredient5"];
        $strIngredient6 = $r["strIngredient6"];
	$strIngredient7 = $r["strIngredient7"];
	$strIngredient8 = $r["strIngredient8"];
        $strIngredient9 = $r["strIngredient9"];
	$strIngredient10 = $r["strIngredient10"];
	$strIngredient11 = $r["strIngredient11"];
        $strIngredient12 = $r["strIngredient12"];
	$strIngredient13 = $r["strIngredient13"];
	$strIngredient14 = $r["strIngredient14"];
	$strIngredient15 = $r["strIngredient15"];
	$sendback .= '<img src="';
	$sendback .= "$strDrinkThumb";
	$sendback .= '" height="300"><br><br>';
	$sendback .= "Name: ";
	$sendback .= "$strDrink";
	$sendback .= "<br>Instructions: ";
	$sendback .= "$strInstructions";
	$sendback .= "<br><br>Glass: $strGlass";
	$sendback .= "<br>Ingredients: ";
	if($strIngredient1){$sendback .= "$strIngredient1";}
if($strIngredient2){$sendback .= ", $strIngredient2";}
if($strIngredient3){$sendback .= ", $strIngredient3";}
if($strIngredient4){$sendback .= ", $strIngredient4";}
if($strIngredient5){$sendback .= ", $strIngredient5";}
if($strIngredient6){$sendback .= ", $strIngredient6";}
if($strIngredient7){$sendback .= ", $strIngredient7";}
if($strIngredient8){$sendback .= ", $strIngredient8";}
if($strIngredient9){$sendback .= ", $strIngredient9";}
if($strIngredient10){$sendback .= ", $strIngredient10";}
if($strIngredient11){$sendback .= ", $strIngredient11";}
if($strIngredient12){$sendback .= ", $strIngredient12";}
if($strIngredient13){$sendback .= ", $strIngredient13";}
if($strIngredient14){$sendback .= ", $strIngredient14";}
if($strIngredient15){$sendback .= ", $strIngredient15";}
$sendback .= "<br><br>_________________________<br><br>";
}
//$test = "IT WORKS IT WORKS IT WORKS IT WORKS";
//if(!$strIngredient3){$strIngredient3 = "something else";};
return $sendback;

}




function newDrink($strDrink, $strGlass, $strInstructions, $strDrinkThumb, $strIngredient1, $strIngredient2, $strIngredient3, $strIngredient4, $strIngredient5, $strIngredient6, $strIngredient7, $strIngredient8, $strIngredient9, $strIngredient10, $strIngredient11, $strIngredient12, $strIngredient13, $strIngredient14, $strIngredient15)
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
$s = "insert into drinks values ('$strDrink', '$strGlass', '$strInstructions', '$strDrinkThumb', '$strIngredient1', '$strIngredient2', '$strIngredient3', '$strIngredient4', '$strIngredient5', '$strIngredient6', '$strIngredient7', '$strIngredient8', '$strIngredient9', '$strIngredient10', '$strIngredient11', '$strIngredient12', '$strIngredient13', '$strIngredient14', '$strIngredient15')";
print "SQL select statement is: $s ... ";
($t = mysqli_query ( $db,  $s   ) );
      //        or die ( mysqli_error ($db) );
print "new drink from thecocktaildb api added ... ";
mysqli_close($db);
return "drink not found. retrieved drink data from thecocktaildb.com api and added to database. try again.";
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

case "findDrink":
	return findDrink($request['whatdrink']);

case "newDrink":
	return newDrink($request['strDrink'], $request['strGlass'], $request['strInstructions'], $request['strDrinkThumb'], $request['strIngredient1'], $request['strIngredient2'], $request['strIngredient3'], $request['strIngredient4'], $request['strIngredient5'], $request['strIngredient6'], $request['strIngredient7'], $request['strIngredient8'], $request['strIngredient9'], $request['strIngredient10'], $request['strIngredient11'], $request['strIngredient12'], $request['strIngredient13'], $request['strIngredient14'], $request['strIngredient15']);
		

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


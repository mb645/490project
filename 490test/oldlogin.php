<?php
print "Hello<br><br>" ;
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
include ("myfunctions.php");



$hostname = "localhost"     ;
$username = "user1" ;
$project  = "490accounts" ;
$password = "user1" ;


$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "Successfully connected to MySQL.<br><br>";
mysqli_select_db( $db, $project ); 

$flag = false;
$uname = GET("username", $flag);
$pword = GET("password", $flag);
if ($flag) {exit("<br><br>empty input field");};

global $t;
$s = "select * from accounts where username = '$uname' and password = '$pword'";
print "SQL select statement is: $s<br><br>"; 
($t = mysqli_query ( $db,  $s   ) )  or die ( mysqli_error ($db) );
$num = mysqli_num_rows($t);

if ($num < 1)
{
exit("wrong username/password");
}

while ( $r = mysqli_fetch_array ( $t, MYSQLI_ASSOC) )
{
	echo "mysqli_fetch_array<br><br>";
	echo $r[ "username" ];
	echo "<br><br>";
	echo $r[ "password" ];
}




mysqli_close($db);
echo "<br><br>";
exit("login successful");
?>

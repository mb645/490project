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
$email = GET("email", $flag);
if ($flag) {exit("<br><br>empty input field");};

global $t;
$s = "select * from accounts where username = '$uname'";
print "SQL select statement is: $s<br><br>"; 
($t = mysqli_query ( $db,  $s   ) )  or die ( mysqli_error ($db) );
$num = mysqli_num_rows($t);

if ($num > 0)
{
exit("username taken");
}


global $t;
$s = "insert into accounts values ('$uname', '$pword', '$email')";
print "SQL select statement is: $s<br><br>";
($t = mysqli_query ( $db,  $s   ) )  or die ( mysqli_error ($db) );


mysqli_close($db);
echo "<br><br>";
exit("account created try logging in");
?>

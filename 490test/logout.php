<?php
session_start();
$_SESSION = array();
session_destroy();
echo "Your session is terminated<br><br>";
if (!isset($_SESSION['logged']))
{
        echo "<br>login first<br><br>";
        header("refresh:3; url = login.html");
        exit();
}



?>

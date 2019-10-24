<?php
session_start();

if (!isset($_SESSION['logged']))
{
	echo "<br>login first<br><br>";
	header("refresh:3; url = login.html");
	exit();
}

include ("myfunctions.php");

echo "hello world";
?>

<html>
	

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
$("button").click(function(){

$.ajax({
type: "GET",
url: "drinks.php",


success: function(result){
	r = JSON.parse(result);

	res = "<br>Name: " + r.drinks[0].strDrink + "<br>" +
		"Glass: " + r.drinks[0].strGlass + "<br><br>" +
		"Instructions: " + r.drinks[0].strInstructions + "<br><br>" +
		"Ingredients: "

		;
$("#B").html(res);
}

});
});
});


</script>

<table>
<tr><td>
<button id="btn" type="button" class="button">Click</button></td></tr>
<tr><td><div id="B"></div>
</td></tr>

</table>


</html>




<?php

echo "<br><br><a href='logout.php'>Logout</a>";

?>

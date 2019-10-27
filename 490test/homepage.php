<?php
session_start();

if (!isset($_SESSION['logged']))
{
	echo "<br>login first<br><br>";
	header("refresh:3; url = login.html");
	exit();
}

include ("myfunctions.php");
//$something = "hello";
//$something .= " world";
//echo $something;
?>

<html>
	

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
$("button").click(function(){
var whatdrink = $("#whatdrink").val();

if(whatdrink != ''){
$.ajax({
type: "GET",
url: "drinksearch.php",
data: "whatdrink="+whatdrink,

success: function(result){

 
//	r = JSON.parse(result);
/*
	var i;
	res = "";
	for(i = 0; i < r.drinks.length; i++)
	{
		res = res + 
		'<img src="' + r.drinks[i].strDrinkThumb + '"><br><br>' +		
		"<br>Name: " + r.drinks[i].strDrink + "<br><br>" +
		"Instructions: " + r.drinks[i].strInstructions + "<br><br>" +
		"Glass: " + r.drinks[i].strGlass + "<br><br>" +
		"Ingredients: ";	
		if(r.drinks[i].strIngredient1){res = res + r.drinks[i].strIngredient1;}
		if(r.drinks[i].strIngredient2){res = res + ", " + r.drinks[i].strIngredient2;}
		if(r.drinks[i].strIngredient3){res = res + ", " + r.drinks[i].strIngredient3;}
		if(r.drinks[i].strIngredient4){res = res + ", " + r.drinks[i].strIngredient4;}
		if(r.drinks[i].strIngredient5){res = res + ", " + r.drinks[i].strIngredient5;}
		if(r.drinks[i].strIngredient6){res = res + ", " + r.drinks[i].strIngredient6;}
		if(r.drinks[i].strIngredient7){res = res + ", " + r.drinks[i].strIngredient7;}
		if(r.drinks[i].strIngredient8){res = res + ", " + r.drinks[i].strIngredient8;}
		if(r.drinks[i].strIngredient9){res = res + ", " + r.drinks[i].strIngredient9;}
		if(r.drinks[i].strIngredient10){res = res + ", " + r.drinks[i].strIngredient10;}
		if(r.drinks[i].strIngredient11){res = res + ", " + r.drinks[i].strIngredient11;}
		if(r.drinks[i].strIngredient12){res = res + ", " + r.drinks[i].strIngredient12;}
		if(r.drinks[i].strIngredient13){res = res + ", " + r.drinks[i].strIngredient13;}
		if(r.drinks[i].strIngredient14){res = res + ", " + r.drinks[i].strIngredient14;}
		if(r.drinks[i].strIngredient15){res = res + ", " + r.drinks[i].strIngredient15;}
		res = res + "<br><br><br><br>";
	}
 */
		
$("#B").html(result);
}

});
};
});
});


</script>

<table>
<tr><td>
<input type="text" name="whatdrink" id="whatdrink"><br>
<button id="btn" type="button" class="button">Search drink</button></td></tr>
<tr><td><div id="B"></div>
</td></tr>

</table>


</html>




<?php

echo "<br><br><a href='logout.php'>Logout</a>";

?>

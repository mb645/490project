<?php

<html>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type = "text/javascript">
var whatdrink = "margarita";
$.ajax({
type: "GET",
url: "drinks.php",
data: "whatdrink="+whatdrink,

success: function(result){
res = JSON.parse(result);
r = "Name: " + res.drinks[0].strDrink + "<br>";
}
}

echo r;





?>

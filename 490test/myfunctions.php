<?php
function GET($fieldname, &$flag)
{
	global $db;
	$v = $_GET [$fieldname];
	$v = trim ($v);
	if ($v == "")
	{$flag = true; echo "<br><br>$fieldname is empty."; return;};
//	$v = mysqli_real_escape_string ($db, $v);
	echo "$fieldname is $v.<br><br>";
	return $v;
}




?>

<?php
 

$connect = mysql_connect("localhost","root") or die("not connected");
$con2 = mysql_select_db("login",$connect);
if ($con2)
 echo "Connected to DB ";
 else
 echo "not Connected";



 mysql_select_db("aiis_db");
 

?>

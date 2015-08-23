<?php
$mysql_hostname = "5174-srv013";
$mysql_user = "joomla";
$mysql_password = "J00ml4";
$mysql_database = "apaiser";
//$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>
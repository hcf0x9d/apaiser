<?php
$mysql_hostname = "localhost";
$mysql_user = "apaiserc_root";
$mysql_password = "@ccess!1";
$mysql_database = "apaiserc_sys";
//$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>
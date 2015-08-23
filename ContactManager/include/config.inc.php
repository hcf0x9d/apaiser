<?php

$dbhost="localhost";
$dbname="apaiserc_con";
$dbuser="apaiserc_root";
$dbpasswd="@ccess!1";

// connect to the db
$link = mysql_connect($dbhost, $dbuser, $dbpasswd);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$db_selected = mysql_select_db($dbname, $link);
if (!$db_selected) {
    die ('Can\'t use dbreviews : ' . mysql_error());
}

?>
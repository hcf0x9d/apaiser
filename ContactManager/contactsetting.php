<?php

// Change the Email Addresses below to email Id where you want to get your emails.
// Reply Email Address where you want to set reply to email ID


$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/ContactManager/include/config.inc.php');
$sql =  "SELECT * FROM sys_setting limit 1";
	$rset=mysql_query($sql);
	while($row=mysql_fetch_assoc($rset))
{
 $creplyto=$row['replymail'];
$uploadpath=$row['uploadpath'];
$save_path ='http://'.$_SERVER['SERVER_NAME'].$uploadpath;  // do not change this
$autorespond=$row['autorespond']; // no : Disable the Auto-Responder   yes : Enable Auto-Responder.
}

$subjectsql = "SELECT * FROM sys_subject";
	$subjectrset=mysql_query($subjectsql);
	while($rowsubject=mysql_fetch_assoc($subjectrset))
{
if( $subject == $rowsubject['subject']){
$toemail=$rowsubject['email'];
}
}
?>

<?php
include "../include/config.inc.php";
$genralsql = "select * from sys_setting limit 1";
	$genralresults = mysql_query($genralsql) or die(mysql_error()."<br />$genralsql");
	$genralrow = mysql_fetch_assoc($genralresults);
function login($arr_parameters)
{
	// variables
	$usr_name		= $arr_parameters['usr_name'];
	$usr_password	= $arr_parameters['usr_password'];
	$sql = "select * from sys_login where username ='$usr_name' and password = '$usr_password'";
	$results = mysql_query($sql) or die(mysql_error()."<br />$sql");
	$row = mysql_fetch_assoc($results);
	
	if ($row['loginid'] != "")
{ $return = $row['username']; }
	else 						
{ $return = 0; }
return $return;
}

function mailFetchAll($arr_parameters)
{

$mailsql = "select * from sys_mail order by id DESC";
		$results3 = mysql_query($mailsql) or die(mysql_error()."<br />$mailsql");
	while ($row = mysql_fetch_assoc($results3))
{	
$results_final[] = $row;
	 
	}
	return $results_final;
}
// subject Fetch
function subjectFetchAll($arr_parameters)
{

$subjectsql = "select * from sys_subject order by id DESC";
		$subjectresults = mysql_query($subjectsql) or die(mysql_error()."<br />$subjectsql");
	while ($subjectrow = mysql_fetch_assoc($subjectresults))
{	
$results_subject[] = $subjectrow;
	 
	}
	return $results_subject;
}

function subjectFetchid($arr_parameters)
{
	// variables
	$subject_id = $arr_parameters['subject_id'];
	$sql = "select * from sys_subject where id = '$subject_id'";
	$results = mysql_query($sql) or die(mysql_error()."<br />$sql");
	$row = mysql_fetch_assoc($results);
	return $row;
}


function subjectUpdate($arr_parameters)
{
	// variables
	$subject_id		= $arr_parameters['subject_id'];
	$subject_subject 	= $arr_parameters['subject_subject'];
	$subject_email	= $arr_parameters['subject_email'];
	$sql = "update sys_subject set subject = '$subject_subject',email = '$subject_email' where id = '$subject_id'";
	mysql_query($sql) or die(mysql_error()."<br />$sql");
	

}
function subjectadd($arr_parameters)
{
	// variables
	$subject_subject 	= $arr_parameters['subject_subject'];
	$subject_email	= $arr_parameters['subject_email'];
	$sql = "insert into sys_subject set subject = '$subject_subject', email= '$subject_email'";
	mysql_query($sql) or die(mysql_error()."<br />$sql");
	$subject_id = mysql_insert_id();
	return $subject_id;
	}

function settingFetchAll($arr_parameters)
{

$settingsql = "select * from sys_setting limit 1";
	$settingresults = mysql_query($settingsql) or die(mysql_error()."<br />$settingsql");
	$settingrow = mysql_fetch_assoc($settingresults);
	return $settingrow;
}
function settingUpdate($arr_parameters)
{
	// variables
	$setting_id	= $arr_parameters['setting_id'];
	$setting_replyemail = $arr_parameters['setting_replyemail'];
	$setting_autorespond = $arr_parameters['setting_autorespond'];
	$setting_uploadpath = $arr_parameters['setting_uploadpath'];
	$setting_fromemail= $arr_parameters['setting_fromemail'];
	$setting_scriptpath= $arr_parameters['setting_scriptpath'];
	$sql = "update sys_setting set replymail= '$setting_replyemail',autorespond= '$setting_autorespond',frommail = '$setting_fromemail',uploadpath='$setting_uploadpath',scripturl='$setting_scriptpath' where id = '$setting_id'";
	mysql_query($sql) or die(mysql_error()."<br />$sql");
	}

function autorespondfetchall($arr_parameters)
{

$autorespondsql = "select * from sys_autorespondsetting limit 1";
	$autorespondresults = mysql_query($autorespondsql) or die(mysql_error()."<br />$autorespondsql");
	$autorespondrow = mysql_fetch_assoc($autorespondresults);
	return $autorespondrow;
}


function autorespondUpdate($arr_parameters)
{
	// variables
	$autorespond_autorespondid      =$arr_parameters['autorespond_autorespondid'];
	$autorespond_autoemail		= $arr_parameters['autorespond_autoemail'];
	$autorespond_automessage 	= $arr_parameters['autorespond_automessage'];
    $autorespond_autosubject 	= $arr_parameters['autorespond_autosubject'];

$sql = "update sys_autorespondsetting set autorespondemail = '$autorespond_autoemail',autorespondsubject = '$autorespond_autosubject',autorespondmessage = '$autorespond_automessage'";
	
if($arr_parameters['autorespond_imgupload'])
{
$autorespond_imgupload 	= $arr_parameters['autorespond_imgupload'];
$sql .= ",";
$sql .= "Attachmentpath = '$autorespond_imgupload',";
}

if($arr_parameters['autorespond_extensions'])
{
$autorespond_extensions 	= $arr_parameters['autorespond_extensions'];
$sql .= "filetype = '$autorespond_extensions',";
}

if($arr_parameters['autorespond_fname'])
{
$autorespond_fname 	= $arr_parameters['autorespond_fname'];
$sql .= "filename = '$autorespond_fname'";
}



$sql .= "where id = '$autorespond_autorespondid'";
mysql_query($sql) or die(mysql_error()."<br />$sql");
}

function forgotpassword($arr_parameters)
{
global 	$genralrow;
$arr_forgotmail=$arr_parameters['email'];

$qresult="SELECT loginid,email,username,password FROM sys_login WHERE email = '$arr_forgotmail'";

$status=mysql_query($qresult);
 $nows=mysql_num_rows($status);
$rows=mysql_fetch_object($status);
if ($rows->loginid != "")
{ 
$em=$rows->email;
$genralreply=$genralrow['replymail'];
$headers4=$genralrow['frommail'];   ///// Change this address within quotes to your address ///
//$headers.="Reply-to:$genralreply\n";
$headers .= "From: $headers4\n"; 
$headers .= "Errors-to: $headers4\n"; 
//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail un-comment this line
if(mail("$em","ContactManager - Login Details","This is in response to your request for login details for the contact manager  Admin Panel \n \nUsername: $rows->username \n Password: $rows->password \n\n Thank You \n \n Testimo - Admin","$headers"))
$return = $rows->username; }else{ $return = 0; }
return $return;
}
function changepassword($arr_parameters)
{

	$username=$arr_parameters['username'];
    $newpassword=$arr_parameters['newpassword'];
	$oldpassword=$arr_parameters['oldpassword'];
if(mysql_num_rows(mysql_query("SELECT * FROM sys_login WHERE username='$username' AND password = '$oldpassword'")) > 0){
mysql_query("update sys_login  set password='$newpassword' where username='$username'");
$return="success";
}else{
$return = 0;
}
return $return;
}
?>
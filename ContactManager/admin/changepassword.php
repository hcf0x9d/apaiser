<?php
session_start();
include "include/includes.php";
$username=$_SESSION['username'];
if (!$username)
{ header("Location: login.php?mode=failed"); }

if (isset($_POST['Add'])){
$result = "success";
$username=$_POST['username'];
	$arr_parameters['username']			= $username;
	$arr_parameters['newpassword']		= $_POST['newpassword'];
	$arr_parameters['oldpassword']		= $_POST['oldpassword'];
if ( strlen($_POST['oldpassword']) < 3 ){
$errmsg="Password must be more than 3 character length<br/>";
$result= "fail";}					

if ( strlen($_POST['newpassword']) < 3 ){
$errmsg.="New Password must contain more than 3 character length<br/>";
$result= "fail";}
$oldpasswords=$_POST['oldpassword'];
if(mysql_num_rows(mysql_query("SELECT * FROM sys_login WHERE username='$username' AND password = '$oldpasswords'"))){
}else{
$errmsg.="Please enter your correct password<br/>";
$result= "fail";
}
if($result<>"success"){ 
$errmsg=$errmsg;
}else{

$success=changepassword($arr_parameters); 
if (!$success)
    {
        header("Location: changepassword.php?mode=failed");
        exit;
    }

    // successful login
    else
    {
       
     header("Location: changepassword.php?mode=success");
        exit;
    }
}
}
?>
<?php include "include/header.php"; ?>
<div id="content">			
<script type="text/javascript" src="js/cjs.js"></script>			
<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>Change Password</h3>
<p>&nbsp;</p>
<?php if ($errmsg)
{
    print "<div class='infobox error'><a href='#' class='close'><img src='img/close.png' title='close infobox' alt='close' /></a> <div>$errmsg</div></div>";
} ?>
<?php if ($mode == "failed")
{
    print "<div class='infobox error'><a href='#' class='close'><img src='img/close.png' title='close infobox' alt='close' /></a> <div>Please enter the correct password.$errmsg</div></div>";
} ?>
<?php if ($mode == "success")
{
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='close infobox' alt='close' /></a> <div>Password Updated Successfully.</div></div>";
} ?>
<form method="post" action="changepassword.php">
<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" class="input"  maxlength="30">
	<input type="hidden" name="cpassword" value="cpassword">
	<p class="input_field">
<label>Old Password</label><input type="password" name="oldpassword"  class="input_text" value=""  maxlength="30"></p>
	<p class="input_field"><label>New Password</label><input type="password" value="" name="newpassword"  class="input_text" maxlength="30"></p>
<p class="submit"><input type="submit" value="Submit" name="Add" class="button"></p>
	
</form>		</td></tr>
<!-- LOGIN FORM -->		   
	

            </table>
 <?php include "include/footer.php"; ?>

<?php
session_start();
include "include/includes.php";
$username=$_SESSION['username'];
if (!$username)
{ header("Location: login.php?mode=failed"); }

if (isset($_POST['Add'])){

$ssubject=$_POST['subject'];
$semail=$_POST['email'];

	$arr_parameters['subject_subject']		= $_POST['subject'];
	$arr_parameters['subject_email']		= $_POST['email'];

$result = "success";
if ( strlen($ssubject) < 1 ){
$errmsg.=" PlZ Enter Subject<br/>";
$result= "fail";}

	function ValidateEmail($semail)
	{
$regex = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
$eregi = preg_replace($regex,'', trim($semail));

return empty($eregi) ? true : false;
}

if(!$semail)
{
$errmsg.= 'Please enter an e-mail address.<br />';
$result= "fail";
}

if($semail && !ValidateEmail($semail))
{
$errmsg.= 'Please enter a valid e-mail address.<br />';
$result= "fail";
}

if($result<>"success"){ 
//$errmsg.="plz enter username and password";

}else{ 
subjectadd($arr_parameters); 
header("Location: sall.php?mode=addsuccess");
		exit; }
}
?>
<?php include "include/header.php"; ?>
<div id="content">			
<script type="text/javascript" src="js/cjs.js"></script>			
<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>Add Subject - <small>( This subject which shows as dropdown select option in contact form. )</small> </h3>
<p>&nbsp;</p>
<?php if(isset($errmsg)){ ?>
<div class="infobox error"><div><?php echo $errmsg; ?></div></div>
 
<?php } ?>
<form action="<?php echo $PHP_SELF; ?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return validate(this)">

            <table width="100%">
                <tr>
                    <td>  Subject* </td>
                    <td><input name="subject" type="text" size='40' class="text_input"  id="from" value="<?php echo $edit[subject]; ?>" class="required inpt" /
                    </td>
                </tr>
              
                <tr>
                    <td valign="top"> E-Mail </td>
                    <td><input  class="text_input" name="email" type="text" id="email" size='40'  value="<?php echo $edit['email']; ?>" />
                    </td>
                </tr>
                
               <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button" name="Add" value="submit">
                    </td>
                </tr>
            </table>
        </form>
     <?php include "include/footer.php";
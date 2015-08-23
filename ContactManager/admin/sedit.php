<?php
session_start();
include "include/includes.php";
$username=$_SESSION['username'];
if (!$username)
{ header("Location: login.php?mode=failed"); }

if (isset($_POST['Add'])){
$id=$_POST['id'];
	$arr_parameters['subject_id']			= $id;
	$arr_parameters['subject_subject']		= $_POST['subject'];
	$arr_parameters['subject_email']		= $_POST['email'];
subjectUpdate($arr_parameters); 
header("Location: sall.php?mode=editsuccess");
		exit; }
?>
<?php include "include/header.php"; ?>
<div id="content">			
<script type="text/javascript" src="js/cjs.js"></script>			
<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>Edit Subject - <small>( Below are the subjects which shows as dropdown select option in contact form. )</small> </h3>
<p>&nbsp;</p>
<?php
$id=$_GET['id'];
$arr_parameters['subject_id'] =$id;
$arr_subject = subjectFetchid($arr_parameters);
?>
	<form action="<?php echo $PHP_SELF; ?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return validate(this)">

            <table width="100%">
                <tr>
                    <td>  Subject* </td>
                    <td><input name="subject" type="text" size='40' class="text_input"  id="from" 
value="<?php echo $arr_subject[subject]; ?>" class="required inpt" />
                    </td>
                </tr>
               <input type="hidden" name=id value="<?php echo $id; ?>">
                <tr>
                    <td valign="top"> E-Mail </td>
                    <td><input  class="text_input" name="email" type="text" id="email" size='40'  value="<?php echo $arr_subject['email']; ?>" />
                    </td>
                </tr>
                
               <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button" name="Add" value="submit">
                    </td>
                </tr>
            </table>
        </form>
   <?php include "include/footer.php"; ?>

<?php
session_start();
include "include/includes.php";
$mode=$_GET['mode'];
$username = $_SESSION['username'];
if (!$username) {
    header("Location: login.php?mode=failed");
}

if (isset($_POST['Add'])) {
    $id = $_POST['id'];
    $arr_parameters['setting_id'] = $id;
    $arr_parameters['setting_replyemail'] = $_POST['replyemail'];
    $arr_parameters['setting_autorespond'] = $_POST['autorespond'];
    $arr_parameters['setting_uploadpath'] = $_POST['uploadpath'];
    $arr_parameters['setting_fromemail'] = $_POST['fromemail'];
$arr_parameters['setting_scriptpath'] = $_POST['scriptpath'];
    settingUpdate($arr_parameters);
    header("Location: setting.php?mode=editsuccess");
    exit;
}
?>
<?php include "include/header.php"; ?>
<div id="content">			
<script type="text/javascript">
//<![CDATA[   
  function validate(oForm){
   
var v = new RegExp();
	v.compile("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$");
	if (!v.test(oForm["replyemail"].value)) {
		alert("You must supply a valid Email.");
		oForm.replyemail.focus();
		return false;
		}
	if(oForm.uploadpath.value.length == 0){
		alert("Please Enter Img Upload Path.");
		oForm.uploadpath.focus();
		return false;
		}

var theurl= oForm.scriptpath.value;
     var tomatch= /http:\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/
     if (tomatch.test(theurl))
     {
        
     }
     else
     {
     alert("URL invalid. Try again.");
         return false; 
     }

	return true;
}
//]]>
</script>

			
<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>General Settings </h3>
<p>&nbsp;</p>

<?php if ($mode == "editsuccess")
{
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>Successfully Updated</div></div>";
} ?>
<form action="<?php echo $PHP_SELF; ?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return validate(this)">
<table width="100%">
<?php
$arr_setting = settingFetchAll($arr_parameters);
?>
<tr><td>Auto Responder Enable/Disable</td><td class="select">


<select name="autorespond">
<?php $autorespond = $arr_setting['autorespond']; ?>
<option value="yes" <?php if (isset($autorespond) && $autorespond == "yes") { ?>selected<?php } ?>>Yes</option>
<option value="no" <?php if (isset($autorespond) && $autorespond == "no") { ?>selected<?php } ?>>No</option>
</select></tr>
<tr><td>From E-Mail</td><td><input type="text" name="fromemail"   class="text_input medium-input" value="<?php echo
$arr_setting['frommail']; ?>"> &nbsp; <small>example: Contact: &lt;yourmail@example.com&gt;</small> </td></tr>

<tr><td>Reply E-Mail</td><td><input type="text" name="replyemail"  id="replyemail" class="text_input medium-input" value="<?php echo
$arr_setting['replymail']; ?>"></td></tr>
<input type="hidden" name="id"    value="<?php echo $arr_setting['id']; ?>">

  <tr><td>Image Upload Path</td><td><input type="text" name="uploadpath" class="text_input medium-input" value="<?php echo
$arr_setting['uploadpath']; ?>"> &nbsp; <small>example: /contactmanager/upload/</small></td></tr> 
<tr><td>Script Instatll Path</td><td><input type="text" name="scriptpath" class="text_input medium-input" value="<?php echo
$arr_setting['scripturl']; ?>"> &nbsp; <small>example: http://yourdomain.com/contactmanager/</small></td></tr> 
            
 <tr><td>&nbsp;</td>
                    <td><input type="submit" class="button" name="Add" value="Save">
                    </td>
                </tr>
            </table>
        </form>
    <?php include "include/footer.php"; ?>
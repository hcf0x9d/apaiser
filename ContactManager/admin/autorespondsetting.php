<?php
session_start();
include "include/includes.php";
$mode=$_GET['mode'];
$username = $_SESSION['username'];
if (!$username) {
    header("Location: login.php?mode=failed");
}

if (isset($_POST['Add'])) {
    $id = $_POST['autorespondid'];
    $arr_parameters['autorespond_autorespondid']=$id;
    $arr_parameters['autorespond_autoemail'] = $_POST['autoemail'];
    $arr_parameters['autorespond_autosubject'] = $_POST['autosubject'];
    $arr_parameters['autorespond_automessage'] = $_POST['automessage'];

$arr_setting = settingFetchAll($arr_parameters);
$uploadpath=$arr_setting['uploadpath'];
if($_FILES["file"]["size"] > 0){
 $extensions= array("txt","csv","xls","htm","html","zip","doc","rtf","ppt","pdf","swf","flv","avi",
    "wmv","mov","jpg","jpeg","gif","png");
foreach ($_FILES as $file) 
{
if (!in_array(end(explode(".",
            strtolower($file['name']))),
            $extensions)) {
       die($file['name'].' is an invalid file type!<br/>'.
        '<a href="javascript:history.go(-1);">'.
        '&lt;&lt Go Back</a>');
      }
 $types =$_FILES['file']['type'];
$ext = strrchr($_FILES['file']['name'], ".");
 $fname = substr($_FILES['file']['name'], 0, -strlen($ext)) .md5(uniqid($_FILES['file']['name'])).$ext;
$imgupload=$_SERVER[DOCUMENT_ROOT] . $uploadpath . basename($fname);
if(move_uploaded_file($_FILES['file']['tmp_name'], $imgupload)) {
    
    
}
$arr_parameters['autorespond_extensions'] =$types;
$arr_parameters['autorespond_fname'] =$fname;
$arr_parameters['autorespond_imgupload'] =$imgupload;

}}

autorespondUpdate($arr_parameters);
    header("Location: autorespondsetting.php?mode=editsuccess");
    exit;
}
include "include/header.php"; ?>
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

	return true;
}
//]]>
</script>

			
<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>Auto-Responder Setting</h3>
<p>&nbsp;</p>


<?php if ($mode == "editsuccess")
{
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>Successfully Updated</div></div>";
} ?><?php
$arr_autorespond = autorespondFetchAll($arr_parameters);
?>
      	<form action="<?php echo $PHP_SELF; ?>" method="post" name="form1" enctype="multipart/form-data" onsubmit="return validate(this)">

            <table width="100%">
                <tr>
                    <td> Auto Responder e-mail * </td>
                    <td><input name="autoemail" type="text" size='40' class="text_input"  id="from" value="<?php echo $arr_autorespond['autorespondemail']; ?>"  />
                    </td>
                </tr>
               
                <tr>
                    <td valign="top"> Auto Responder Subject </td>
                    <td><input  class="text_input" name="autosubject" type="text" id="subject" size='40'  value="<?php echo $arr_autorespond['autorespondsubject']; ?>" />
                    </td>
                </tr><input type="hidden" name="autorespondid" value="<?php echo $arr_autorespond['id']; ?>">
                <tr>
                    <td valign="top"> Auto Responder Message *</td>
                    <td class="textarea"><textarea name="automessage" rows="5" style="width:250px;" id="message"><?php echo $arr_autorespond['autorespondmessage']; ?></textarea>
                    </td>
                </tr>
<tr>
                    <td valign="top"> Attachment Path  *</td>
                    <td><?php echo $arr_autorespond['Attachmentpath']; ?>
                    </td>
                </tr>

<tr>
                    <td valign="top"> Attachment  *</td>
                    <td><input type="file" name="file">
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
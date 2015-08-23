<?php
session_start();
if( empty($_SESSION['username'])) :
	exit( header('Location:login.php'));
endif;
include "include/includes.php";
	$submit=$_POST['Add'];
	if($submit){
$status = "OK";
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject=$_POST['subject'];

$cc=$_POST['cc'];
$bcc=$_POST['bcc'];
$msg="";
$msgerror="";
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);



if ( strlen($message) < 5 ){
$msgerror=$msgerror."* your Message field is blank must be more than 5 words<BR/>";
$status= "NOTOK";}	


if (!stristr($email,"@") OR !stristr($email,".")) {
$msgerror=$msgerror."* your email address is not correct<BR />";
$status= "NOTOK";}   


if($status=="OK"){// echo $query;
global 	$genralrow;
$genralreply=$genralrow['replymail'];
$from=$genralrow['frommail']; 
$headers .= 'From:'.$from. "\r\n";
$headers .= 'Cc:'.$cc . "\r\n";
$headers .= 'Bcc:'.$bcc . "\r\n";
$headers.='Reply-to:'.$from."\n";

$headers4=$email; 
$headers .= "Errors-to: $headers4\n";
$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;
mail($headers4,$subject,"Contactus <BR>
Email:$email
<br>Message: $message","$headers");
$msg="Thank you! your message has been sent!.";
}
	}
?>

<?php include "include/header.php"; ?>
<div id="content">
<?php
include('../include/config.inc.php');
$id=$_GET['id'];
$sql =  "SELECT * FROM sys_mail where id='$id'";
$rset = mysql_query($sql);
$edit = mysql_fetch_assoc($rset);
?>

<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>Send Mail</h3>
<p>&nbsp;</p>


<?php if ($msg)
{
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>$msg</div></div>";
} ?>
<?php if ($msgerror)
{
    print "<div class='infobox error'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>$msgerror</div></div>";
} ?>



  	<form action="send.php?id=<?php echo $id ?>" method="post" name="form1" enctype="multipart/form-data" >

            <table width="100%">
                <tr>
                    <td>  Subject* </td>
                    <td><input name="subject" type="text" size='40' class="text_input"  id="from" value="apaiser contact" class="required inpt" /
                    </td>
                </tr>
<tr>
                    <td valign="top">CC</td>
                    <td><input class="text_input" name="cc" type="text" id="email" size='40'  value="" />
                    </td>
                </tr>
<tr>
                    <td valign="top">BCC</td>
                    <td><input class="text_input" name="bcc" type="text" id="email" size='40'  value="" />
                    </td>
                </tr>
               
                <tr>
                    <td valign="top"> E-Mail </td>
                    <td><input  class="text_input" name="email" type="text" id="email" size='40'  value="<?php echo $edit['email']; ?>" />
                    </td>
                </tr>

 <tr>
                    <td valign="top"> Country</td>
                    <td><?php echo nl2br($edit['country']);
?> </td>
                </tr>
 <tr>
                    <td valign="top"> Role</td>
                    <td><?php echo nl2br($edit['role']);
?> </td>
                </tr>


 <tr>
                    <td valign="top"> Original Message</td>
                    <td><?php echo nl2br($edit['comments']);
?> </td>
                </tr>


                <tr>
                    <td valign="top"> Message</td>
                    <td><textarea name="message" cols=20 rows=5></textarea>
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
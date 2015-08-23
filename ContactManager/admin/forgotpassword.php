<?php
include "include/includes.php";
$mode = $_POST[mode];
if (!$mode)
{
    $mode = $_GET['mode'];
}
		if (isset($_POST['emails'])){
$email=$_POST['email'];
$arr_parameters['email'] = $email;
 $username = forgotpassword($arr_parameters);
if (!$username)
    {
        header("Location: forgotpassword.php?mode=failed");
        exit;
    }else
    {
     header("Location: forgotpassword.php?mode=success");
        exit;
  }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contactform Manager</title>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<!--[if gt IE 5.5]>
<script type="text/javascript" src="js/unitpngfix.js"></script>
<![endif]-->
</head>
<body id="login">
<div id="login_wrapper">
	<div id="login_header">
		<img id="logo" src="img/logo.png" width="165" height="50" alt="Contactform Manager" />
	</div>
	
	<div id="login_content">
<?php if ($mode == "failed")
{
    print "<div class='infobox error'><div>Please enter correct e-mail Address.</div></div>";
} ?>
<?php if ($mode == "success")
{
    print "<div class='infobox success'><div>Thank You. Your password is sent to your email address. Please check your mail after some time.</div></div>";
} ?>
<h3>Plz Enter The Email</h3>
	<form method="post" action="forgotpassword.php">

<p><label>Email</label><input type="text" name="email" size="30" class="text_input" maxlength="100">	</p>
	<input type="hidden" name="emails" value="email">

<p class="submit"><input type="submit" value="Submit" name="submit" class="button"></p>
	
</form>		</td></tr>
<!-- LOGIN FORM -->		   
</table>
		</div>			
</div>
</body>
</html>
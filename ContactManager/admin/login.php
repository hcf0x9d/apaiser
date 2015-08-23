<?php
session_start();
include "include/includes.php";
$mode = $_POST[mode];
if (!$mode)
{
    $mode = $_GET['mode'];
}
$username = $_POST['username'];
$password = $_POST['password'];
if ($mode == "login")
{
    // compare username/password
    $arr_parameters['usr_name'] = $username;
    $arr_parameters['usr_password'] = $password;
    $usernames = login($arr_parameters);
    if (!$usernames)
    {
        header("Location: login.php?mode=failed");
        exit;
    }

    // successful login
    else
    {
        $_SESSION['username'] = $username;
        header("Location:index.php");
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
		<img id="logo" src="/MediaFiles/Images/apaiser_logo.png" width="165" alt="Contactform Manager"  style="margin-bottom:20px;" />
        <h3>Contact Form Manager</h3>
	</div>
	
	<div id="login_content">
		<form action="login.php" method="post">
<?php if ($mode == "failed")
{
    print "<div class='infobox error'><div>Username or password entered were incorrect.</div></div>";
} ?>	

		<p><label>Username</label>
			<input class="text_input" type="text" name="username" />
		</p>
		
		<div class="clear"></div>
		<p><label>Password</label>
			<input class="text_input" type="password" name="password" />
		</p><input type="hidden" name="mode" value="login">
		<div class="clear"></div>
		<p><input class="button" type="submit" name="submit" class="button" value="Login" /></p>
		<div class="clear"></div>
		<p class="alignright"><a href="forgotpassword.php">Forgot Password?</a></p>
		</form>
	</div>			
</div>
</body>
</html>
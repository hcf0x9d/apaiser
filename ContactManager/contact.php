<?php

// Do not edit this if you are not familiar with php
error_reporting (E_ALL ^ E_NOTICE);
$post = (!empty($_POST)) ? true : false;
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/ContactManager/contactsetting.php');
if($post)
	{
	/*function ValidateEmail($email)
	{
        $eregi = filter_var($email, FILTER_VALIDATE_EMAIL);
                
        return empty($eregi) ? true : false;
    }*/

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$subject ='apaiser contact form from ' /*.$_POST['name']*/;
$message = $_POST['message'];
$phone =$_POST['phone'];
$country =$_POST['country'];
$role =$_POST['role'];
$subscribed =$_POST['subscribed'];
$answer = trim($_POST['answer']);
$verificationanswer="4"; // plz  change edit your human answer
$to = $toemail.','.$creplyto;
//$to = 'jason@averetek.com';

$error = '';
$headers="";
$headers .= 'From:'.$email. "\r\n";
$headers.='Reply-to:'.$email."\n";
$headers.= 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;

// Checks Name Field

if(!$name)
{
$error .= 'Please enter your name.<br />';
}

// Checks Email Field

if(!$email)
{
$error .= 'Please enter an e-mail address.<br />';
}

/*if($email && !ValidateEmail($email))
{
$error .= 'Please enter a valid e-mail address.<br />';
}*/

if(is_numeric($phone))
    {
        
if(!$phone || strlen($phone) < 8)
{
$error .= "Please enter your Phone Number. It should have 10  Numbers.<br />";
}


    }
    else
    {
       $error .="Please enter numeric characters in Phone Number field.<br />";
    }



// Checks Subject Field
/*if(!$subject)
{
$error .= 'Please enter your subject.<br />';
}
*/
if( $answer <> $verificationanswer)
{
$error .= 'Please enter the Correct verification number.<br />';
}
// Checks Message (length)
if(!$message || strlen($message) < 5)
{
$error .= "Please enter your message. It should have at least 5 characters.<br />";
}




if(!$error)
	{
	$messages="From: $email <br>";
	$messages.="Name: $name <br>";
	$messages.="Email: $email <br>";
	$messages.="Phone: $phone <br>";
	$messages.="Country: $country <br>";
	$messages.="Role: $role <br>";
	$messages.="Subscribed to List: $subscribed <br>";
	$messages.="Message: $message <br>";


	$mail = mail($to,$subject,$messages,$headers);

		if($mail)
		{

			echo 'OK';
			$date=date("F j, Y");
			include($path.'/ContactManager/include/config.inc.php');
		
			$sql="INSERT INTO sys_mail VALUES(NULL,'$name','$email','$phone','$country','$role','$message','$subscribed','$date')";
			if($name && $email && $phone && $message){
			
				$rset=mysql_query($sql);
				
				if($rset)
				{
					
					echo '<div class="success">Your Mail has been added successfully.</div>';
					
					printf("<script>location.href='/thanks.php'</script>");
                    
                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/thanks.php">';    
                    exit; 
				}
				else if(mysql_errno()==1062)
				{
					$error.="Duplicate data.";
				}
				else
				{
				  $error.="Adding Testimonial failed.";
				}
			}
		if($autorespond == "yes")
		{
			include($path."/ContactManager/autoresponde.php");
		}
	}

}
else
{

echo '<div class="error">'.$error.'</div>';
}

}
?>
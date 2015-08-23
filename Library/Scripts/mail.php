<?php 

if(isset($_POST["submit"])) 
{ 
    $name = $_POST["name"]; 
    $phone = $_POST["phone"]; 
    $email = $_POST["email"]; 
     
    if(empty($name)||empty($phone)||empty($email)) 
    { 
        echo "ERROR MESSAGE"; 
        die; 
    } 
    $cvsData ='"name","phone","email"'.PHP_EOL; 
    $cvsData .= "\"$name\",\"$phone\",\"$email\"".PHP_EOL; 
    $fp = fopen("test.csv", "a"); 
     
    if($fp) 
    { 
        fwrite($fp,$cvsData); // Write information to the file 
        fclose($fp); // Close the file 
    } 
     
     
}
?>
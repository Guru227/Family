<?php
	include("../config.php");
   	session_start();
   
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
    	// username and password sent from form 
    	  
	  	$myusername = mysqli_real_escape_string($db,$_POST['user']);
      	$mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      	$sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
     	$result = mysqli_query($db,$sql);
      	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      	//$active = $row['active'];
      
      	$count = mysqli_num_rows($result);
      
      	// If result matched $myusername and $mypassword, table row must be 1 row
		
      	if($count == 1) {
         	//session_register("myusername");
         	$_SESSION['login_user'] = $myusername;
         
         	header("location: ../../html/you.php");
          //header("location: post-login.php");
      	}else {
         	header("location: ../../html/login-error.html");

      	}
   	}
?>
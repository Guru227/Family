<?php
	session_start();
	include(__DIR__."\..\config.php");

	if ($db->connect_error) {
    	die("Connection failed: " . $db->connect_error);
	}

	print_r($_POST);

	$username = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$sql = "insert into USERS (username, email, password) VALUES ('$username', '$email', '$pass')";

	if ($db->query($sql) === TRUE) {
	    echo "New record created successfully";
	    $_SESSION['login_user'] = $username;
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}

	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$db->close();
	header('location: ../../html/details.html');

?>
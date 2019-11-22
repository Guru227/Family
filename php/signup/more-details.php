<?php
	session_start();
	echo"hello";
	echo $_SESSION['login_user'];
	include(__DIR__."\..\config.php");

	if ($db->connect_error) {
    	die("Connection failed: " . $db->connect_error);
	}


	$details = $_POST;
	print_r($details);
	echo "<br>";

	$temp1 = Array($details['name'],$details['father'],$details['mother'],$details['sibling'],$details['child']);
	$temp2 = Array($details['name'],$details['dob'],$details['location'],$details['instagram'],$details['twitter'],$details['facebook'],$details['github'],$details['linkedin']);

	$sql1_substring = "'".implode("','", $temp1)."'";
	echo "<br>";
	$sql2_substring = "'".implode("','", $temp2)."'";
	
	echo $sql1_substring;
		echo "<br>";
	echo $sql2_substring;


	print_r($temp1);
	echo "<br>";
	print_r($temp2);
	echo "<br>";

	$sql1 = 'insert into RELATIONSHIPS(name, father, mother, sibling, child) 
	VALUES('.$sql1_substring.')';
		echo "<br>";


	if ($db->query($sql1) === TRUE) {
	    echo "New record created successfully in relationships<br>";
	} else {
	    echo "Error: " . $sql1 . "<br>" . $db->error;
	}

	$sql2 = 'insert into BASIC_INFO(username, dob, location, instagram, twitter, facebook, github, linkedin) VALUES('.$sql2_substring.')';
	if ($db->query($sql2) === TRUE) {
	    echo "New record created successfully in basic_info<br>";
	} else {
	    echo "Error: " . $sql2 . "<br>" . $db->error;
	}

	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
	}

	$db->close();

	header('location: ../../html/you.php');
	
?>
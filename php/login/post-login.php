<?php
	include("../config.php");
	session_start();

	// Check connection
	if ($db->connect_error) {
	    die("Connection failed: " . $db->connect_error);
	}

	//queries for data from users table
	$sql_1 = "SELECT * FROM users";
	$result_1 = $db->query($sql_1);

	//goes into this loop only if there is some data 
	if ($result_1->num_rows > 0) 
	{
	    //iterates through result_1 rows
	    while($row = $result_1->fetch_assoc()) 
	    {
	    	// sets variable id to the id of the user in this particular session
	    	if($_SESSION['login_user'] == $row['username'])
	    	{
	    		$id = $row['id'];
	    		echo $id."<br>";
	    		echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
	    	}//end of variable setting
	    }
	}	
	else{
		echo "There is no data stored in db:users yet";
	}

	$sql_2 = "SELECT * FROM relationships";
	$result_2 = $db->query($sql_2);

	//goes into this loop only if there is some data 
	if ($result_2->num_rows > 0) 
	{
	    //iterates through result_1 rows
	    while($row = $result_2->fetch_assoc()) 
	    {
	    	// sets variable id to the id of the user in this particular session
	    	if($id == $row['id'])
	    	{
	    		break;
	    	}//end of variable setting
	    }
	}
	else{
		echo "There is no data stored in db:family yet";
	}
	
	print_r($row);
	echo "<br />";
	echo $row['username']."<br />";
	echo $row['father']."<br />";
	echo $row['mother']."<br />";
	echo $row['sibling']."<br />";
	echo $row['child']."<br />";



	$db->close();
?>
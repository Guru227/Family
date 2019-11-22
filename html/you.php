<?php
	include("../php/login/config.php");
	session_start();

	//cannot directly use session vaariable in sql string
	$temp = $_SESSION['login_user'];

	//queries for users data from table 'users'
	$sql_1 = "SELECT id, username, email FROM users where username = '$temp' ";
	$userinfoArray = ($db->query($sql_1)) -> fetch_assoc();		//returns row object, and then fetch associated data

	//setting variable id
	$user_id = $userinfoArray['id'];

	$sql_2 = "SELECT * FROM relationships where id = '$user_id' ";
	$relationshipArray = $db->query($sql_2) -> fetch_assoc();		//returns row object, and then fetch associated data"

	$sql_3 = "SELECT * FROM basic_info where id = '$user_id' ";
	$basicinfoArray = $db->query($sql_3) -> fetch_assoc();		//returns row object, and then fetch associated data"
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Family - You Page</title>
    <link rel="stylesheet" type="text/css" href="../css/gen-styles.css">
    <link rel="stylesheet" type="text/css" href="../css/you.css">
    <link rel="stylesheet" type="text/css" href="../css/chat-box.css">
	<!-- Font Icon -->
    <link rel="stylesheet" href="../material-design-iconic-font/css/material-design-iconic-font.min.css">
</head>
<body>
    <!-- CSS Navbar-->
    <div class="parallax">
        <header>
            <div class="nav-container">
            <h1 class="logo">Family</h1>
            <nav>
                <ul>
                <li><a href="#">Your Family</a></li>
                <li><a href="grow.html">Grow</a></li>
                <li><a href="../php/login/logout.php">Log-out</a></li>
                </ul>
            </nav>
            </div>
      </header>
      <!--first row-->
      <div class="row" id="top-row">
      	<?php
        echo "<div class='col-md-12' id='page-welcome'>Welcome ".$userinfoArray['username']."!</div>";
        ?>
      </div>
    </div>

    <!--second row-->
    <div class="row">
        <div class="col-md-1"></div>
    	<div class="col-md-3">
            <div class="section-heading">Personal Details</div>
        </div>
    	<div class="row col-md-7" >
            <div class="col-md-4"> 
                <div class="col-md-12 inline-pic"> 
                <i class="zmdi zmdi-account material-icons-name zmdi-hc-4x"></i>
                </div>
                <?php
                echo '<div class="tag-name">'. $userinfoArray["username"]. '</div>';
                ?>
            </div>
            <div class="col-md-4">
                <div class="col-md-12 inline-pic"> 
                <i class="zmdi zmdi-calendar zmdi-hc-4x"></i>
                </div>
                <?php
                echo '<div class="tag-name">'. $basicinfoArray['dob'].'</div>';
                ?>
            </div>
            <div class="col-md-4"> 
                <div class="col-md-12 inline-pic"> 
                <i class="zmdi zmdi-city zmdi-hc-4x"></i>
                </div>
                <?php
                echo '<div class="tag-name">'.$basicinfoArray['location'].'</div>';
                ?>
            </div>
        </div>
    	<div class="col-md-1"></div>
    </div>	
    
    <hr/>

    <!--third row-->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="row col-md-7" >
            <div class="col-md-4">
            	<?php
                echo '<a href="'.$basicinfoArray['instagram'].'" target="_blank">';
                ?> 
                <div class="col-md-12 inline-pic">
                <i class="zmdi zmdi-instagram material-icons-name zmdi-hc-4x"></i>
                </div>
                </a>
                <div class="tag-name">@insta</div>
            </div>
            <div class="col-md-4">
                <?php
                echo '<a href="'.$basicinfoArray['twitter'].'" target="_blank">';
                ?>
                <div class="col-md-12 inline-pic">
                <i class="zmdi zmdi-twitter zmdi-hc-4x"></i>
                </div>
                </a>
                <div class="tag-name">#twitter</div>
            </div>
            <div class="col-md-4"> 
                <?php
                echo '<a href="'.$basicinfoArray['facebook'].'" target="_blank">';
                ?>
                <div class="col-md-12 inline-pic">
                <i class="zmdi zmdi-facebook zmdi-hc-4x"></i>
                </div>
                </a>
                <div class="tag-name">facebook</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="section-heading">Social Media Handles</div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <!--fourth row-->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="row col-md-8">
            <div class="col-md-4">
                <?php
                echo '<a href="'.$basicinfoArray['github'].'" target="_blank">';
                ?>
                <div class="col-md-12 inline-pic">
                <i class="zmdi zmdi-github material-icons-name zmdi-hc-4x"></i>
                </div>
                </a>
                <div class="tag-name">@github</div>
            </div>
            <div class="col-md-4">
                <?php
                echo '<a href="'.$basicinfoArray['linkedin'].'" target="_blank">';
                ?>
                <div class="col-md-12 inline-pic">
                <i class="zmdi zmdi-linkedin zmdi-hc-4x"></i>
                </div>
                </a>
                <div class="tag-name">@linkedin</div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12 inline-pic email">
                <i class="zmdi zmdi-google zmdi-hc-4x"></i>
                </div>
                <div class="tag-name">@gmail</div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>

    <hr/> 

    <!--Fifth row-->  
    <div class="row">
    <div class="col-md-3">
        <div class="section-heading">Your Parents</div>
    </div>
    <div class="row col-md-6" >
        <div class="col-md-6"> 
            <div class="col-md-12 tree"> 
            <i class="zmdi zmdi-male-alt zmdi-hc-4x"></i>
            </div>
            <?php
            echo '<div class="tag-name">'.$relationshipArray['father'].'</div>'
            ?>
        </div>
        <div class="col-md-6"> 
            <div class="col-md-12 tree"> 
            <i class="zmdi zmdi-female zmdi-hc-4x"></i>
            </div>
            <?php
            echo '<div class="tag-name">'.$relationshipArray['mother'].'</div>'
            ?>
        </div>
    </div>
    <div class="col-md-3"></div>
    </div>
    
    <!--not of class-row, but sixth row-->
    <div id="svg1">
    <svg height="5em" width="100vw">
        <!--Middle line-->
        <line x1="49%" y1="25%" x2="49%" y2="100%"/>
        <!--top left line to dad-->
        <line x1="49%" y1="25%" x2="35%" y2="25%"/>
        <line x1="35%" y1="25%" x2="35%" y2="0%"/>
        <!--top-right line to mum-->
        <line x1="49%" y1="25%" x2="63%" y2="25%"/>
        <line x1="63%" y1="25%" x2="63%" y2="0%"/>
        <!--bottom left line that goes to sibling and then down-->
        <line x1="49%" y1="75%" x2="17%" y2="75%"/>
        <line x1="17%" y1="75%" x2="17%" y2="100%"/>
    </svg>
    </div>

    <!--Seventh row-->  
    <div class="row">
    <div class="row col-md-9" >
        <div class="col-md-5"> 
            <div class="col-md-12 tree"> 
            <i class="zmdi zmdi-male-alt zmdi-hc-4x"></i>
            </div>
            <?php
            echo '<div class="tag-name">'.$relationshipArray['sibling'].'</div>'
            ?>
        </div>
        <div class="col-md-5"> 
            <div class="col-md-12 tree"> 
            <i class="zmdi zmdi-male-alt zmdi-hc-4x"></i>
            </div>
            <?php
            echo '<div class="tag-name">'.$relationshipArray['username'].'</div>'
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="col-md-3">
        <div class="section-heading">Your siblings and You</div>
    </div>
    </div>

    <!--not of class-row, but eighth row-->
    <div id="svg2">
    <svg height="5em" width="100vw">
        <!--Middle line-->
        <line x1="49%" y1="0%" x2="49%" y2="50%"/>
        <!--Line to the right towards the child-->
        <line x1="49%" y1="50%" x2="70%" y2="50%"/>
        <!--bottom right line that goes to dude/dudess that just drops down-->
        <line x1="70%" y1="50%" x2="70%" y2="100%"/>
    </svg>
    </div>

    <!--Ninth row-->  
    <div class="row">
    <div class="col-md-3">
        <div class="section-heading">You're Children</div>
    </div>
    <div class="row col-md-9" >
        <div class="col-md-5"></div>
        <div class="col-md-5"> 
            <div class="col-md-12 tree"> 
            <i class="zmdi zmdi-male-alt zmdi-hc-4x"></i>
            </div>
            <?php
            echo '<div class="tag-name">'.$relationshipArray['child'].'</div>'
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>

    <!--Chat Box on bottom right corner-->
    <button class="chat-open-button" onclick="openForm()">Chat</button>
    <!--on opening form, the chat-popup is shown over the chat-open-button-->
    <div class="chat-popup" id="myForm">
    <form action="/action.php" class="chat-form">
        <h1>Chat</h1>
        <label for="msg"><b>Message</b></label>
        <textarea placeholder="Type message..." name="msg" required></textarea>

        <button type="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
    </div>


    
    <script src="../js/you.js"></script>
</body>
</html>
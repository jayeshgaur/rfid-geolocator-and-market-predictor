<?php
  require '_mailer/PHPMailerAutoload.php';
  include("_mailer/class.phpmailer.php");
  session_start();
  $_SESSION['orderno'] = $_POST['trackid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cargo Tracking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Shipmemt, Track Shipment, Business Analysis, Cargo Tracking,Cargo Tracking and Business analysis, Analysze business, Analyze business, predict, PRediction  K. J. Somaiya College of Engineering, K. J. Somaiya College of Engineering Canteen, KJSCE, Somaiya, Somaiya College, Track online, Business">
  <meta name="description" content="Cargo Tracking, a online cargo tracking system, that provids tracking of shipmenets, analyse business, and make required decisions for business growth.">
  <meta name="author" content="Cargo Tracking">
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link rel="icon" href="images/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}
      .trackit{
          margin-right: 15%;
          margin-left: 15%;
          margin-top: 15%;
          align-content: center;
      }

      .problem{
          margin-left: 32.5%;
      }
    </style>
  </head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php">Cargo Tracking</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php">ORDER</a></li>
<!--            <li><a href="#myModal" data-toggle="modal" data-target="#myModal">TRACK</a></li>-->
            <li><a href="predict.php">PREDICT</a></li>
            <li><a href="index.php">ABOUT US</a></li>
            <li><a href="index.php">CONTACT</a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="trackit">
<ol class="progtrckr" data-progtrckr-steps="3">






<!-- Working php code  -->

<?php 

include 'connect.php';



	$sql = "SELECT * FROM orders WHERE order_no=".$_POST['trackid']."";
	$result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_SESSION['email'] != $row['email'])
    {
    	echo "You don't have any order with this track id!";
    }
    else
    {
    	if($row['rfid']==NULL)
    	{
            echo "<p class='text-center' style='color:#46b8da;font-size: 24px;'>"."We haven't received your Cargo yet!"."</p>";
    		//echo "We haven't received your Cargo yet!";
    	}
    	else if($row['rfid']!=NULL)
    	{
    		$sql = "SELECT * FROM tracking WHERE order_no=".$_POST['trackid']."";
			$result = $mysqli->query($sql);
			$row = mysqli_fetch_assoc($result);

			if($row['Checkpoint 1'] == 1)
			{
				if($row['Checkpoint 2'] == 1)
				{
					echo '<li class="progtrckr-done">Order not shipped</li> ' . '<li class="progtrckr-done">Order at checkpoint 1</li> ' . '<li class="progtrckr-done">Order at checkpoint 2</li> ';
				}
				else
				{
				 	 echo '<li class="progtrckr-done">Order not shipped</li> ' . '<li class="progtrckr-done">Order at checkpoint 1</li> ' . '<li class="progtrckr-todo">Order at checkpoint 2</li> ';
				}
			}
			else
			{
				echo '<li class="progtrckr-done">Order not shipped</li> ' . '<li class="progtrckr-todo">Order at checkpoint 1</li> ' . '<li class="progtrckr-todo">Order at checkpoint 2</li> ';
			}


    	}
    }
  

?>

<!-- OLD PHP CODE, KEEP IT <?php

include 'connect.php';

$sql = "SELECT * FROM tracking WHERE order_no=".$_POST['trackid']."";

$sql1 = "SELECT * FROM orders WHERE order_no=".$_POST['trackid']."";

$result = $mysqli->query($sql);
    
$result1 = $mysqli->query($sql1);


if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc())
    {
        $email = $row1['email'];
        //echo $email;
    }

    
if ($result->num_rows > 0) 
{
  //echo "ifff";
    while($row = $result->fetch_assoc()) 
  {echo "ifff";
    		if($_SESSION['email'] != $email)
    {    	// Code to redirect to index.php stating please check only your orders
    	echo "ifff";
    header('Location: index.php');
    }
    else
    {// Actual code
    //echo "ahfsfh"."<br><br>"."addskdsd";
        if($row["Checkpoint 1"] == 1)
    	{
    		if($row["Checkpoint 2"] == 1)
    		{
    			//echo "Reached Checkpoint 2. Ready for Delivery!";
          echo '<li class="progtrckr-done">Order not shipped</li> ' . '<li class="progtrckr-done">Order at checkpoint 1</li> ' . '<li class="progtrckr-done">Order at checkpoint 2</li> ';
        }
        else
        {
    		//echo "Reached Checkpoint 1. Waiting for cargo to arrive at Checkpoint 2";
          echo '<li class="progtrckr-done">Order not shipped</li> ' . '<li class="progtrckr-done">Order at checkpoint 1</li> ' . '<li class="progtrckr-todo">Order at checkpoint 2</li> ';
        }
    	}
      else 
      {
    //echo "Cargo still not shipped.";
          echo '<li class="progtrckr-done">Order not shipped</li> ' . '<li class="progtrckr-todo">Order at checkpoint 1</li> ' . '<li class="progtrckr-todo">Order at checkpoint 2</li> ';
      }
    }
  }
}
else{

echo"<br>";
echo "The Cargo has not been received at the moment.";   


} }
else {
	echo "You have no order with this number!";
}
?> 
OLD PHP CODE, KEEP IT-->
</ol>
</div>

<br>
<div class="text-left" style='color:#777;font-size: 20px;margin-left:2%;'>
Notice any problem? Is your cargo out of sync? Check here!
<form action="ticket.php" style="margin-top:2%;">
<input type="Submit" style="align-content:center;"  value="Notify us!">
</form>
</div>


<footer class="container-fluid text-center">
      <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Website Made By KJSCE students. Copyrights &copy; issued.</p>
</footer>
<script>
$(document).ready(function(){
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
        window.location.hash = hash;
      });
    }
  });
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
})
</script>
</body>
</html>
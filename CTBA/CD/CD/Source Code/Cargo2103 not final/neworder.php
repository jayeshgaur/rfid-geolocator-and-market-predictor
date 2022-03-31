<?php

  require '_mailer/PHPMailerAutoload.php';
  include("_mailer/class.phpmailer.php");
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){


  $text='LOGIN/REGISTER';
  $text2='signup.php';
  $text3='Please login first';
}
else
{ 
  $text='LOGOUT';
  $text2='logout.php';
  $text3="";
}
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
</head>
<body id="myPage" style=" background-color: #ededed;" data-spy="scroll" data-target=".navbar" data-offset="60">
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
            <?php
            if(!isset($_SESSION['email']) || empty($_SESSION['email']))
              {}else{
                ?>
              

            <li><a href="index.php">ORDER</a></li>
<!--            <li><a href="#myModal" data-toggle="modal" data-target="#myModal">TRACK</a></li>-->
            <li><a href="predict.php">PREDICT</a></li>
            <?php
        } ?>
            <li><a href="index.php">ABOUT US</a></li>
            <li><a href="index.php">CONTACT</a></li>
            <li><a href="<?php echo $text2;?>"><?php echo $text;?></a></li>
          </ul>
        </div>
      </div>
    </nav>

<div style="  margin-top: 5%; margin-left: auto; margin-right: auto;
  width: 50%;
  padding: 25px;
  text-align: center;
  font-size: 24px;">
<?php 

include 'connect.php';

$email = $_POST['email'];
date_default_timezone_set('Asia/Calcutta');
$date = date('m/d/Y h:i:s a', time());
$source = $_POST['source'];
$destination = $_POST['destination'];
$weight = $_POST['weight'];
$type = $_POST['cargo_type'];

 $sql = "INSERT INTO orders (email, order_date, source, destination, weight, cargo_type) VALUES ('$email','$date','$source','$destination','$weight','$type')";
if ($mysqli->query($sql) == TRUE) {

	$sql = "SELECT * FROM orders WHERE order_date='$date'";
	$result = $mysqli->query($sql);
		if ($result->num_rows > 0) 
		{
    	 	while($row = $result->fetch_assoc())
    		{
    			$order_number = $row['order_no'];
                
    		}
    	}


?>
    <br><br>
    <?php
    echo "New order has been created successfully."; 
    ?> 
    
    <br> 
    <br>

    <?php
    echo "Your order number is: ";
    echo $order_number;
      $account="ctbakjsce@gmail.com";//email id from which email is being sent (Sender's email)
      $password="cargo2019";
      $reply_to = $email;//emailid on which email is to be sent(Receiver)
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth= true;
      $mail->Port = 465; // Or 587
      $mail->Username= $account;
      $mail->Password= $password;
      $mail->SMTPSecure = 'ssl';
      $mail->setFrom($email, 'Cargo Tracing and Business Analysis');
      $mail->isHTML(true);
      $mail->addAddress($email);
      $mail->addReplyTo($reply_to, 'No-reply');
      $msg = "<h1 style='color:#46b8da;'>Welcome! We are happy to serve you!</h1><br>";
      $subject = "Cargo Tracing and Business Analysis. Your order number is: ".$order_number;
      $mail->Body = $msg;
      $mail->Subject = $subject;
//    echo $account;
//    echo $reply_to;
    
      if(!$mail->send())
      {
        // echo "Mailer Error: " . $mail->ErrorInfo;
        return 0;
      }
      else
      {
        // echo "E-Mail has been sent.";
        return 1;
      }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
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
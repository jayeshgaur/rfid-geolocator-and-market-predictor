<?php
namespace Phpml\Metric;

use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\Ensemble\AdaBoost;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Regression\LeastSquares;
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  $text='LOGIN/REGISTER';
  $text2='login.php';
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
<!--  <link rel="stylesheet" type="text/css" href="css/index.css">-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      /*color: #303030;*/
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      /*color: #303030;*/
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #f5822B;
      color: #fff;
      padding: 100px 25px 25px 25px;
      font-family: Montserrat, sans-serif;
      margin-bottom: 0px !important;
  }
  #services {
    background: #ffffff url("images/img1.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 700px;
    color: #111;
    font-size: 25px;

  }
  .btn-menu {
    background-color: #f5822B;
    font-size: 25px;
  }
#track {
    /*background: #ffffff url("../images/JVB_09221.jpg") no-repeat center center fixed;*/
    background-color: #555;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 700px;
    color: #111;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f5822B;
      font-size: 50px;
  }
  .logo {
      color: #f5822B;
      font-size: 200px;
  }
  .thumbnail {
      padding: 15px 0 15px 0;
      border: none;
      border-radius: 2px;
      color: #303030 !important;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f5822B;
  }
  .carousel-indicators li {
      border-color: #f5822B;
  }
  .carousel-indicators li.active {
      background-color: #f5822B;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f5822B; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f5822B;
      background-color: #fff !important;
      color: #f5822B;
      outline: none;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f5822B !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f5822B;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #f5822B;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f5822B !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f5822B;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  #copyright {
  	position: fixed;
  }
#menu-links-upper , #menu-links-lower {
	transition:all 0.4s ease;
}
.ee {
border: none;
background: #404040;
color: #ffffff !important;
font-weight: 100;
font-size: 24px;
padding: 5px;
border-radius: 6px;
display: inline-block;
width: 15%;
}

.ee:hover {
color: #404040 !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: #f9fffc;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;
}</style>
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
          <a class="navbar-brand" href="#myPage">Cargo Tracking</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#services">HOME</a></li>
            <?php
            if(!isset($_SESSION['email']) || empty($_SESSION['email']))
            	{}else{
            ?>
            <li><a href="#order">ORDER</a></li>
            <li><a href="predict.php">PREDICT</a></li>
            <?php } ?>
            <li><a href="#about">ABOUT US</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li><a href="<?php echo $text2;?>"><?php echo $text;?></a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="jumbotron text-center">
  <h1>Cargo Tracking and Business Analysis</h1> 
</div>

<!-- Container (Home Section) -->
<div id="services" class="container-fluid text-center">
     <br>
	 Worried?
	 Go check your cargo shipment!
	 <br>
	 <br>
		<?php 
            if(!isset($_SESSION['email']) || empty($_SESSION['email']))
                {
        ?>
        <a class="btn btn-menu" href="<?php echo $text2;?>">Login to Track</a>	
			<?php } ?>
			
        <?php 
            if(!(!isset($_SESSION['email']) || empty($_SESSION['email']))){
        ?>
        <a class="btn btn-menu" href="#myModal" data-toggle="modal" data-target="#myModal">Track it! </a>
            <?php } ?>
		<?php if(!isset($_SESSION['email']) || empty($_SESSION['email'])){} else{} ?>
</div>

<!-- Container (Order Section) -->
<?php
    if(!isset($_SESSION['email']) || empty($_SESSION['email']))
	{}
    else{
?>
            	
<div id="order" class="container-fluid">
  <div class="text-center">
    <h4>Just a step away from hustle free Shipping.</h4>
    <h4>Enter the following details!</h4>
    <div class="row slideanim">
      <form method="POST" action="neworder.php">
            <label style="width:15%;">Email id:</label> <input name="email" type="email" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="example@mail.com"/><br><br>
            <label style="width:15%;">Source:</label> <input name="source" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;"  placeholder="India"/><br><br>
            <label style="width:15%;">Destination:</label> <input name="destination" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Japan"/><br><br>
            <label style="width:15%;"> Cargo Type:</label> <input name="cargo_type" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Electronics"/><br><br>
            <label style="width:15%;">Quantity:</label> <input name="weight" type="text" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;"  placeholder="in KGs"/><br><br>
       <div align="center"> <button class="ee">Submit</button></div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

<!-- Track section-->
<div class="modal fade" id="myModal" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Track Your Order</h4>
        </div>
        <form action="track.php" method="POST">
            <div class="modal-body">
            <label style="width:35%;">Enter Order Number:</label> <input type="text" name="trackid" style ="margin-top: 1.5%;<border-></border->radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;"  placeholder="#256987" />
            </div>
            <div class="modal-footer">
              <div align="center"><button class="ee" style="width:40%;" > Track it! </button></div>
            </div>
        </form>
      </div>      
    </div>
</div>
          
<!-- Container (About Section) -->
<div id="about" class="container-fluid"  style="background-color: #d9dde0"; >
  <div class="row">
    <div class="col-sm-8">
      <h2>About Page</h2><br>
        <h4>Our project provides unparalleled insight into when your package will be delivered. Our tracking system helps you to check the status of your shipment. This saves your time of calling customer care service and rushing about searching for your lost package. Our site ensures security to your shipment as well as provides an advanced business analysis for your business. It helps you monitor your profits and provides you free auditing, suggestions and guidance as to where to ship, when to ship etc. to enhance your sales. We aim to provide easy, user friendly tracing of cargo as well as empowering our clients with a tool to maximize their profits.</h4>
          <br><a href="#contact"><button class="btn btn-default btn-lg">Get in Touch</button></a>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-thumbs-up logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey" style="background-color: #c9cfd3; font-size:20px;">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <ul><strong>Quality:</strong> We provide outstanding services that deliver premium value to customers.</ul>
      <ul><strong>Integrity:</strong> We uphold highest standards of secrecy and integrity in all our actions.</ul>
      <ul><strong>Personal accountability:</strong> We are personally accountable for delivering on our commitments.</ul>
      <ul><strong>Trust:</strong> We earn and maintain customer's trust via complete transparency and effective services.</ul>
      <ul><strong>Simplicity:</strong> We believe that simplicity is the ultimate sophistication and ensure that people from all walks of life can easily learn and avail our services.</ul>

    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid" style="background-color: #bcc2c6; color: #111;" >
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Vidyavihar, Mumbai</p>
      <p><span class="glyphicon glyphicon-phone"></span> +91 976xxxx242</p>
      <p><span class="glyphicon glyphicon-envelope"></span> abcmailus@somaiya.edu</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="googleMap" style="height:400px;width:100%;"></div>
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(19.073515, 72.899544);
        var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKLkh14U7emzS-7e4BsehgEVo2pEhMXYA&callback=myMap"></script>
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Website Made By KJSCE students. Copyrights &copy; issued.</p>
</footer>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
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
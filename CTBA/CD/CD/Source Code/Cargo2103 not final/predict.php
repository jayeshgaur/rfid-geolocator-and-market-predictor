<?php
namespace Phpml\Metric;
use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\Ensemble\AdaBoost;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Regression\LeastSquares;
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
header('Location: index.php');
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
<style>
@import url("https://fonts.googleapis.com/css?family=Droid+Serif");
.container1 {
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Droid Serif', serif;
    font-size: 24px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}a {
    text-decoration: none !important;
    color: white !important;
}
.button1 {
  position: relative;
  display: inline-flex;
  text-decoration: none;
  color: #fff;
  background-color: #76abe9;
  padding-left: 2rem;
  overflow: hidden;
  z-index: 1;
  align-items: center;
  box-shadow: 0px 3px 4px -4px rgba(0, 0, 0, 0.75);
}
.button1::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  -webkit-transform: scaleX(0);
          transform: scaleX(0);
  -webkit-transform-origin: 0 50%;
          transform-origin: 0 50%;
  width: 100%;
  height: 100%;
  background-color: #4A90E2;
  z-index: -1;
  transition: -webkit-transform 750ms;
  transition: transform 750ms;
  transition: transform 750ms, -webkit-transform 750ms;
}
.button1 span {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 2rem;
  padding: 1rem;
  overflow: hidden;
  background-color: #4A90E2;
}
.button1 svg {
  max-width: 20px;
  width: 100%;
  height: auto;
  max-height: 18px;
  fill: white;
}
.button1:hover::before {
  -webkit-transform: scaleX(1);
          transform: scaleX(1);
}
.button1:hover svg {
  -webkit-animation: moveArrow 750ms;
          animation: moveArrow 750ms;
}

@-webkit-keyframes moveArrow {
  0% {
    -webkit-transform: translateX(0px);
            transform: translateX(0px);
  }
  49% {
    -webkit-transform: translateX(50px);
            transform: translateX(50px);
  }
  50% {
    -webkit-transform: translateX(-50px);
            transform: translateX(-50px);
  }
  100% {
    -webkit-transform: translateX(0px);
            transform: translateX(0px);
  }
}

@keyframes moveArrow {
  0% {
    -webkit-transform: translateX(0px);
            transform: translateX(0px);
  }
  49% {
    -webkit-transform: translateX(50px);
            transform: translateX(50px);
  }
  50% {
    -webkit-transform: translateX(-50px);
            transform: translateX(-50px);
  }
  100% {
    -webkit-transform: translateX(0px);
            transform: translateX(0px);
  }
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
            <?php
            if(!isset($_SESSION['email']) || empty($_SESSION['email']))
              {}else{
                ?>
            <?php } ?>
            <li><a href="<?php echo $text2;?>"><?php echo $text;?></a></li>
          </ul>
        </div>
      </div>
</nav>

<div id="predict" class="container-fluid">
    <br><br>     
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <defs>
          <symbol id="arrow" viewBox="0 0 100 100">
            <path d="M12.5 45.83h64.58v8.33H12.5z"/>
                <path d="M59.17 77.92l-5.84-5.84L75.43 50l-22.1-22.08 5.84-5.84L87.07 50z"/>
          </symbol>
      </defs>
    </svg>

    <div class="container1">
        <div class="content">
            <br><br>
            <a href="predict1.php" class="button1" style="width:100%;"><br>
                Predictions <br><br>
                <span>
                    <svg>
                        <use xlink:href="#arrow" href="#arrow"></use>
                    </svg>
                </span>
            </a>
            <br><br><br>
        </div>
    </div>

    <div class="container1" >
        <div class="content">
            <br>
            <a href="suggestnew.php" class="button1"><br>
                Suggestions <br><br>
                <span>
                    <svg>
                        <use xlink:href="#arrow" href="#arrow"></use>
                    </svg>
                </span>
            </a>
        </div>
    </div>
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
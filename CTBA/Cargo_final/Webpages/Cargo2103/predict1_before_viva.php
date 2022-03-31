<?php

namespace Phpml\Metric;
include './vendor/autoload.php';
include './vendor/php-ai/php-ml/src/Metric/Accuracy.php';


use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\Ensemble\AdaBoost;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Regression\LeastSquares;

error_reporting(E_ERROR | E_PARSE);
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
             <li><a href="predict.php">PREDICT</a></li>
             <li><a href="<?php echo $text2;?>"><?php echo $text;?></a></li>
          </ul>
        </div>
      </div>
    </nav>
<?php
$flag = 0;
$CargoType = $ProductName = $Season = $DCountry= $DConti = "";
$CargoTypeErr = $ProductNameErr = $SeasonErr = $DCountryErr = $DContiErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
     if (empty($_POST["CargoType"])) {
    $CargoTypeErr = "Cargo Type is required";
  } 
     else {
    $CargoType = test_input($_POST["CargoType"]);
         $flag=1;
  }
 {
     if (empty($_POST["ProductName"])) {
    $ProductNameErr = "Product Name is required";
  } 
     else {
    $ProductName = test_input($_POST["ProductName"]);
         $flag=1;
  }
 }
 {
     if (empty($_POST["Season"])) {
    $SeasonErr = "Season is required";
  } 
     else {
    $Season = test_input($_POST["Season"]);
         $flag=1;
  }
 }
 {
     if (empty($_POST["DCountry"])) {
    $DCountryErr = "Destination Country is required";
  } 
     else {
    $DCountry = test_input($_POST["DCountry"]);
         $flag=1;
  }
 }
 {
     if (empty($_POST["DConti"])) {
    $DContiErr = "Destination Continent is required";
  } 
     else {
    $DConti = test_input($_POST["DConti"]);
         $flag=1;
  }
 }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    
<div id="predict" class="container-fluid" style="background-color: #eff3f7"; >
  <div class="text-center">
   <br>
    <!--<h2>order</h2>--> 
    <h4>Business would become easier if it could be curated. </h4>
    <h4>Enter the following details and get acquainted with the expected profits!</h4>
    <br><div class="row slideanim">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="">
          
          <label style="width:15%;">Cargo Type:</label> <input type="text" name ="CargoType" style ="margin-top: 1.5%; border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Electronics"/><span ><?php echo $CargoTypeErr;?></span><br><br>
          
          
          <label style="width:15%;">Product Name: </label><input type="text" name ="ProductName" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px;    border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Television" /><span ><?php echo $ProductNameErr;?></span><br><br>
          
          
          <label style="width:15%;">Season:</label> <input type="text" name ="Season" style =" margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Summer"/><span ><?php echo $SeasonErr;?></span><br><br>
          
          
          <label style="width:15%;"> Destination Country :</label> <input type="text" name ="DCountry" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="India"/><span ><?php echo $DCountryErr;?></span><br><br>
          
          
       <label style="width:15%;"> Continent :</label> <input type="text" name ="DConti" style ="margin-top: 1.5%;border-radius:5%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="Asia"/><span ><?php echo $DContiErr;?></span><br><br><br>
<div align="center"><button type="submit" class="ee" href="" > Predict! </button></div><br>
      </form>
    </div>
<?php   
    if($flag==1)
    {

        $dataset = new CsvDataset('cargodm.csv', 5, false);
        $X = $dataset->getSamples();
        $Y = $dataset->getTargets();

        $classifier = new NaiveBayes();
        $classifier->train($X, $Y);

        $predict = array("$CargoType","$ProductName","$Season","$DCountry","$DConti");
        $result = $classifier->predict($predict);
            echo "<p style='color:red; font-size:26px;'>"." The Expected Profit is: ".$result."%."."</p>";
        //print_r($result);
    }
?>
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
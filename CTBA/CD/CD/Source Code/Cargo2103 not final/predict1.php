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
          
          <label style="width:15%;">Cargo Type:</label> 
          <select name="CargoType" id="CargoType" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Electronics</option>
    <option >Home Appliances</option>
    <option> Men's Clothing  </option> 
    <option>Women's Clothing</option>
    <option>Kids Collection</option>
    <option>Books</option>
    <option>Hardware</option>
    <option>Construction supplies</option>
    <option>Grocery Store</option>
    <option>Cosmetics</option>
    <option>Cereal store</option>
    <option>GYM equipments</option>
    <option>Sports</option>
    <option>Shoes</option>
    <option>Vehicles</option>
                       </select><span ><?php echo $CargoTypeErr;?></span><br><br>
          
          
          <label style="width:15%;">Product Name: </label>
          
            <select name="ProductName" id="ProductName" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
            <option>Televisions</option>
            <option>Home Entertainment Systems</option>
            <option>Headphones</option>
            <option>Speakers</option>
            <option>Home Audio & Theater</option>
            <option>Cameras</option>
            <option>DSLR Cameras</option>
            <option>Security Cameras</option>
            <option>Camera Accessories</option>
            <option>Musical Instruments & Professional Audio</option>
            <option>Gaming Consoles</option>
            <option>All Other Electronics</option>
            <option>Air Conditioners</option>
            <option>Refrigerators</option>
            <option>Washing Machines</option>
            <option>Kitchen & Home Appliances</option>
            <option>Heating & Cooling Appliances</option>
            <option>Kitchen & Dining</option>
            <option>Kitchen Storage & Containers</option>
            <option>Furniture</option>
            <option>Fine Art</option>
            <option>Home Furnishing</option>
            <option>Bedroom Linen</option>
            <option>Home Decor</option>
            <option>Garden & Outdoors</option>
            <option>Home Storage</option>
            <option>Indoor Lighting</option>
            <option>Home Improvement</option>
            <option>T-shirts & Polos</option>
            <option>Shirts</option>
            <option>Jeans</option>
            <option>Innerwear</option>
            <option>Watches</option>
            <option>Bags & Luggage</option>
            <option>Sunglasses</option>
            <option>Jewellery</option>
            <option>Wallets</option>
            <option>Sportswear</option>
            <option>Western Wear</option>
            <option>Ethnic Wear</option>
            <option>Lingerie & Nightwear</option>
            <option>Handbags & Clutches</option>
            <option>Gold & Diamond Jewellery</option>
            <option>Fashion & Silver Jewellery</option>
            <option>Fashion Sandals</option>
            <option>Ballerinas</option>
            <option>The Designer Boutique</option>
            <option>Handloom & Handicraft Store</option>
            <option>Toys & Games</option>
            <option>Baby Products</option>
            <option>Diapers</option>
            <option>Baby Bath, Skin & Grooming</option>
            <option>Strollers & Prams</option>
            <option>Nursing & Feeding</option>
            <option>Kids' Clothing</option>
            <option>Kids' Shoes</option>
            <option>School Bags</option>
            <option>Kids' Watches</option>
            <option>Kids' Fashion</option>
            <option>Baby Fashion</option>
            <option>Fiction Books</option>
            <option>Editor's Corner</option>
            <option>School Textbooks</option>
            <option>Children's Books</option>
            <option>Exam Central</option>
            <option>Textbooks</option>
            <option>Indian Language Books</option>
            <option>Used Books</option>
            <option>Kindle eBooks</option>
            <option>Ladders</option>
            <option>Door Hardware & Locks</option>
            <option>Bathroom Hardware</option>
            <option>Tapes, Adhesives & Sealers</option>
            <option>Cabinet Hardware</option>
            <option>Window Hardware</option>
            <option>Furniture Hardware</option>
            <option>Hooks</option>
            <option>Address Numbers & Plaques</option>
            <option>Padlocks & Hasps</option>
            <option>Mailboxes</option>
            <option>Gate Hardware</option>
            <option>Cement</option>
            <option>Sand & Aggregates</option>
            <option>TMT Steel Bars</option>
            <option>Bricks & Blocks</option>
            <option>Electrical</option>
            <option>Plumbing</option>
            <option>Wooden Products</option>
            <option>Tiles</option>
            <option>Bathroom Accessories</option>
            <option>Hardware Fixtures</option>
            <option>Paints & Finishes</option>
            <option>Lighting & Fixtures</option>
            <option>Granites</option>
            <option>Ready Mix Concrete</option>
            <option>Fresh Vegetables</option>
            <option>Herbs & Seasonings</option>
            <option>Fresh Fruits</option>
            <option>Exotic Fruits</option>
            <option>Veggies Cuts</option>
            <option>Sprouts Organic</option>
            <option>Fruits</option>
            <option>Vegetables</option>
            <option>Flower Bouquets and Buncheshes</option>
            <option>Make Up</option>
            <option>Skin</option>
            <option>Bath and Body</option>
            <option>Hair Frangrance</option>
            <option>Accessories</option>
            <option>Men</option>
            <option>Electronics</option>
            <option>Wellness</option>
            <option>Cereal & Snack Bars</option>
            <option>Children's Cereals</option>
            <option>Flakes</option>
            <option>Granola Cereals</option>
            <option>Muesli</option>
            <option>Oats & Porridge</option>
            <option>Aerobic Training Machines</option>
            <option>Balance Trainers</option>
            <option>Clothing</option>
            <option>Footwear</option>
            <option>Gym Bags</option>
            <option>Pilates</option>
            <option>Strength Training Equipment</option>
            <option>Yoga</option>
            <option>Cricket</option>
            <option>Badminton</option>
            <option>Cycling</option>
            <option>Football</option>
            <option>Running</option>
            <option>Camping & Hiking</option>
            <option>Fitness Accessories</option>
            <option>Strength Training</option>
            <option>Cardio Equipment</option>
            <option>Certified Refurbished</option>
            <option>Exercise & Fitness</option>
            <option>Sports, Fitness & Outdoors</option>
            <option>Backpacks</option>
            <option>Rucksacks</option>
            <option>Suitcases & Trolley Bags</option>
            <option>Travel Duffles</option>
            <option>Travel Accessories</option>
            <option>Casual Shoes</option>
            <option>Flats</option>
            <option>Formal Shoes</option>
            <option>Flip Flops</option>
            <option>Heels</option>
            <option>Sports Shoes</option>
            <option>Sandals</option>
            <option>Sports Sandal</option>
            <option>Motorbike Accessories & Parts</option>
            <option>Car Accessories</option>
            <option>Car Electronics</option>
            <option>Car Parts</option>
            <option>Car & Bike Care</option>
            <option>Car & Motorbike Products</option>
            <option>Industrial & Scientific Supplies</option>
            <option>Test, Measure & Inspect</option>
            <option>Lab & Scientific</option>
            <option>Janitorial & Sanitation Supplies</option>


        </select><span ><?php echo $ProductNameErr;?></span><br><br>
          
          
          <label style="width:15%;">Season:</label> <select name="Season" id="Season" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Summer</option>
    <option >Winter</option>
    <option >Rainy</option>
  </select><span ><?php echo $SeasonErr;?></span><br><br>
          
          
          <label style="width:15%;"> Destination Country :</label>  <select name="DCountry" id="DCountry" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
      <option>Morocco</option>  
      <option>China</option>
      <option> India</option>
      <option>Russia</option>
      <option>Kenya</option>
      <option>Japan</option>
      <option>France</option>
      <option>Nigeria</option>
      <option>Netherlands</option>
      <option>Panama</option>
      <option>Columbia</option>
      <option>Malaysia</option>
      <option>Mexico</option>
      <option>Germany</option>
      <option>Brazil</option>
      <option>South Africa</option>
      <option>Singapore</option>
      <option>Argentina</option>
      <option>Italy</option>
      <option>Belgium </option>


  </select><span ><?php echo $DCountryErr;?></span><br><br>
          
          
       <label style="width:15%;"> Continent :</label> <select name="DConti" id="DConti" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Asia</option>
    <option >Africa</option>
    <option >Europe</option>
    <option>America</option>
    <option>Austraila</option>
  </select><span ><?php echo $DContiErr;?></span><br><br><br>
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
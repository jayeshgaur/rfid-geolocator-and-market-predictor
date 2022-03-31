<?php

namespace Phpml\Metric;
include './vendor/autoload.php';
include './vendor/php-ai/php-ml/src/Metric/Accuracy.php'; 
use Phpml\Dataset\CsvDataset;
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
  <script>
  window.onload = function() {
  var c = document.getElementById('platypus')
  c.onchange = function() {
    if (c.checked == true) {document.getElementById('answer').style.display = 'inline';}
    else {document.getElementById('answer').style.display = '';
    }
  }
  var d = document.getElementById('platypus1')
  d.onchange = function() {
    if (d.checked == true) {document.getElementById('answer1').style.display = 'inline';}
    else {document.getElementById('answer1').style.display = '';
    }
  }
  var e = document.getElementById('platypus2')
  e.onchange = function() {
    if (e.checked == true) {document.getElementById('answer2').style.display = 'inline';}
    else {document.getElementById('answer2').style.display = '';
    }
  }
  var f = document.getElementById('platypus3')
  f.onchange = function() {
    if (f.checked == true) {document.getElementById('answer3').style.display = 'inline';}
    else {document.getElementById('answer3').style.display = '';
    }
  }
  var g = document.getElementById('platypus4')
  g.onchange = function() {
    if (g.checked == true) {document.getElementById('answer4').style.display = 'inline';}
    else {document.getElementById('answer4').style.display = '';
    }
  }
}
    </script>
    
    <style>
    #answer {display:none;}
    #answer1 {display:none;}
    #answer2 {display:none;}
    #answer3 {display:none;}
    #answer4 {display:none;}
        .wrapper {
    text-align: center;
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
             <li><a href="predict.php">PREDICT</a></li>
             <li><a href="<?php echo $text2;?>"><?php echo $text;?></a></li>
          </ul>
        </div>
      </div>
    </nav>
<form class="row text-center" method="POST" action="suggestnew.php"    style="margin:5%;margin-top:7.5%;"  >
   
    <label for="platypus" style="font-size:20px;">Cargo Type :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus" type="checkbox" name="monotreme" value="platypus" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer" id="answer" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
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

  </select>
    <br><br>
    <label for="platypus1" style="font-size:20px;">Season :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus1" type="checkbox" name="monotreme3" value="platypus1" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer3" id="answer1" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Summer</option>
    <option >Winter</option>
    <option >Rainy</option>
  </select>
    <br><br>
    
    <label for="platypus2" style="font-size:20px;">Destination Continent :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus2" type="checkbox" name="monotreme5" value="platypus2" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer5" id="answer2" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Asia</option>
    <option >Africa</option>
    <option >Europe</option>
    <option>America</option>
    <option>Austraila</option>
  </select>
    <br><br>
    
    
    <label for="platypus3" style="font-size:20px;">Destination Country :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus3" type="checkbox" name="monotreme4" value="platypus3" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer4" id="answer3" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
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


  </select>
    <br><br>
    
    
    <label for="platypus4" style="font-size:20px;">Product Name :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus4" type="checkbox" name="monotreme2" value="platypus4" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer2" id="answer4" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
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


</select>
    <br><br>
    <button class="styledbutton"> Click Here To Get Suggestion </button>
</form>    

<?php

$checkbox1 = FALSE;
$checkbox2 = FALSE;
$checkbox3 = FALSE;
$checkbox4 = FALSE;
$checkbox5 = FALSE;

  if( $_SERVER["REQUEST_METHOD"] == "POST")
  {
     if(isset($_POST['monotreme']))
     {
       $var1 = $_POST['answer'];
       $checkbox1 = TRUE;
     }

     if(isset($_POST['monotreme2']))
     {
       $var2 = $_POST['answer2'];
       $checkbox2 = TRUE;
     }

     if(isset($_POST['monotreme3']))
     {
       $var3 = $_POST['answer3'];
       $checkbox3 = TRUE;
     }

     if(isset($_POST['monotreme4']))
     {
       $var4 = $_POST['answer4'];
       $checkbox4 = TRUE;
     }

     if(isset($_POST['monotreme5']))
     {
       $var5 = $_POST['answer5'];
       $checkbox5 = TRUE;
     }
  } ?>

 <style>
  table {
   border-collapse: collapse; 
   width: 100%;
   color: #588c7e;
   font-family: 'Montserrat', sans-serif;
   font-size: 15px;
   text-align: left;
   border: 1px solid black;
   
     } 
  th {
   background-color: #588c7e;
   color: white; 
    }

    td, th {
       border: 1px solid black;
       padding: 5px;
   }

    .tablebox
    {
      overflow-y: scroll;
      width: 680px;
      height: 393px;
      margin-top: 30px;
      margin-left: 350px;
    }
    th {position: sticky;
      top: 0;}
  
 </style>
<body>

<?php

$dataset = new CsvDataset('cargodm.csv', 5, false);
$X = $dataset->getSamples();
$Y = $dataset->getTargets();

// Suggestion Mining

$fullcsv = $X;   // A variable to get the columns of Cargo Type, Product, Season, County and Region Type

for ($n=0; $n <sizeof($X) ; $n++) 
{
  array_push($fullcsv[$n], $Y[$n]);
} 

$temp = array(); // A temporary Array
$len = sizeof($fullcsv); // Initialising Length 
$copyoffullcsv = $fullcsv;  // A copy of variable
$finaloutput = array(); // Array for getting maximum profit


// $var1 = 'Electronics'; $checkbox1 = FALSE; 
// $var2 = 'Headphones'; $checkbox2 = FALSE;
// $var3 = 'Winter'; $checkbox3= FALSE;
// $var4 = 'India'; $checkbox4 = FALSE;
// $var5 = 'Australia' ; $checkbox5 = TRUE;


function getStyledResult( $result )
{
  echo('<div class="tablebox">');
  echo('<table align="center">');
  echo('<tr>');
  echo('<th>Cargo Type</th>');
  echo('<th>Product</th>');
  echo('<th>Season</th>');
    echo('<th>Country</th>');
    echo('<th>Region Type</th>');
    echo('<tr>'); 
  
   for( $i=0; $i < sizeof($result); $i++) 
   {
   echo('<tr>');
   echo('<td>' . $result[$i][0] . '</td>');
   echo('<td>' . $result[$i][1] . '</td>');
   echo('<td>' . $result[$i][2] . '</td>');
   echo('<td>' . $result[$i][3] . '</td>');
   echo('<td>' . $result[$i][4] . '</td>');
   echo('</tr>');
   }
   
   echo('</table>');
   echo('</div>');
}

if( $checkbox1 == TRUE)
{ 
  $len = sizeof($copyoffullcsv);
  $temp = array();
  $finaloutput = array();

  for ($x=0; $x < $len ; $x++) 
  {
    if( $copyoffullcsv[$x][0] == $var1 )
      array_push($temp, $copyoffullcsv[$x]);
  }
  
  $max_profit = max(array_column($temp, 5));
  
  for ($i=0; $i < sizeof($temp) ; $i++) 
  { 
      if ( $temp[$i][5] == $max_profit ) 
        array_push($finaloutput, $temp[$i]);    
  } 

}


if( $checkbox2 == TRUE)
{
  if( $checkbox1 == TRUE )
  {
    $copyoffullcsv = $temp;
    $len = sizeof($copyoffullcsv); 
    $temp = array(); 
    $finaloutput = array();
  }

    for ($x=0; $x < $len ; $x++) 
    { 
      if( $copyoffullcsv[$x][1] == $var2 )
        array_push($temp, $copyoffullcsv[$x]);
    }

    $max_profit = max(array_column($temp, 5));
  
      for ($i=0; $i < sizeof($temp) ; $i++) 
        { 
      if ( $temp[$i][5] == $max_profit ) 
        array_push($finaloutput, $temp[$i]);    
        } 
  }


  if( $checkbox3 == TRUE)
  {
    if( $checkbox1 == TRUE || $checkbox2 == TRUE )
    {
      $copyoffullcsv = $temp;
      $len = sizeof($copyoffullcsv); 
      $temp = array(); 
      $finaloutput = array();
    }

      for ($x=0; $x < $len ; $x++) 
      { 
        if( $copyoffullcsv[$x][2] == $var3 )
          array_push($temp, $copyoffullcsv[$x]);
      }

      $max_profit = max(array_column($temp, 5));
  
          for ($i=0; $i < sizeof($temp) ; $i++) 
            { 
          if ( $temp[$i][5] == $max_profit ) 
           array_push($finaloutput, $temp[$i]);   
            } 
    }


    if( $checkbox4 == TRUE)
    {
      if( $checkbox1 == TRUE || $checkbox2 == TRUE || $checkbox3 == TRUE )
      {
        $copyoffullcsv = $temp;
        $len = sizeof($copyoffullcsv); 
        $temp = array(); 
        $finaloutput = array();
      }

        for ($x=0; $x < $len ; $x++) 
        { 
          if( $copyoffullcsv[$x][3] == $var4 )
            array_push($temp, $copyoffullcsv[$x]);        
        }
        


        $max_profit = max(array_column($temp, 5)); 
  
              for ($i=0; $i < sizeof($temp) ; $i++) 
                { 
          if ( $temp[$i][5] == $max_profit ) 
            array_push($finaloutput, $temp[$i]);    
          } 
      }


      if( $checkbox5 == TRUE)
      {
        if( $checkbox1 == TRUE || $checkbox2 == TRUE || $checkbox3 == TRUE || $checkbox4 == TRUE)
        {
          $copyoffullcsv = $temp;
          $len = sizeof($copyoffullcsv); 
          $temp = array(); 
          $finaloutput = array();
        }

          for ($x=0; $x < $len ; $x++) 
          { 
            if( $copyoffullcsv[$x][4] == $var5 )
              array_push($temp, $copyoffullcsv[$x]);
          }

          $max_profit = max(array_column($temp, 5));
  
                  for ($i=0; $i < sizeof($temp) ; $i++) 
                    { 
            if ( $temp[$i][5] == $max_profit ) 
              array_push($finaloutput, $temp[$i]);    
              } 
        }
 if($finaloutput == NULL)
 {
     echo "No Records available";
 }
    else
    {
        getStyledResult($finaloutput);
    }
?>

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

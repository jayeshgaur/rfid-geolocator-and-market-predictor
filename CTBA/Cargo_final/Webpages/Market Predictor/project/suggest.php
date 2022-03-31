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
            <li><a href="index.php">ORDER</a></li>
<!--            <li><a href="#myModal" data-toggle="modal" data-target="#myModal">TRACK</a></li>-->
            <li><a href="index.php">PREDICT</a></li>
            <li><a href="index.php">ABOUT US</a></li>
            <li><a href="index.php">CONTACT</a></li>
          <?php  
            if(!isset($_SESSION['canteen_logged_in'])){
              echo '<li><a href="signup.php">SIGN UP/ LOG IN</a></li>';  
            } else {
              echo '<li><a>'.strtoupper($_SESSION['canteen_user_firstname']).' '.strtoupper($_SESSION['canteen_user_lastname']).'</a></li>';
              echo '<li><a href="logout.php">LOGOUT</a></li>';
            }

          ?>
          </ul>
        </div>
      </div>
    </nav>


    <div class="row text-center" style="margin:5%;margin-top:7.5%;">
    <label for="platypus" style="font-size:20px;">Cargo Type :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus" type="checkbox" name="monotreme" value="platypus" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer" id="answer" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Electronics</option>
    <option >Home Appliances</option>
  </select>
    </div>
    
    <div class="row text-center" style="margin:5%;">
    <label for="platypus1" style="font-size:20px;">Season :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus1" type="checkbox" name="monotreme" value="platypus1" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer1" id="answer1" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Summer</option>
    <option >Winter</option>
    <option >Rainy</option>
  </select>
    </div>
    
    <div class="row text-center" style="margin:5%;">
    <label for="platypus2" style="font-size:20px;">Destination Continent :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus2" type="checkbox" name="monotreme" value="platypus2" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer2" id="answer2" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >Asia</option>
    <option >Africa</option>
    <option >Europe</option>
  </select>
    </div>
    
    <div class="row text-center" style="margin:5%;">
    <label for="platypus3" style="font-size:20px;">Destination Country :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus3" type="checkbox" name="monotreme" value="platypus3" />&nbsp&nbsp&nbsp&nbsp
  <select name="answer3" id="answer3" style="border-radius:10%; width: 20%; border-radius: 4px; border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;">
    <option >India</option>
    <option >Japan</option>
    <option >America</option>
  </select>
    </div>
    
    <div class="row text-center" style="margin:5%;">
    <label for="platypus4" style="font-size:20px;">Product Name :   </label>&nbsp&nbsp&nbsp&nbsp
<input id="platypus4" type="checkbox" name="monotreme" value="platypus4" />&nbsp&nbsp&nbsp&nbsp

     <input type="text" name="answer4" id="answer4" style ="margin-top: 1.5%;border-radius:5%;  border-radius: 4px;    border: 1px solid #DADADA; font-size: 14px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; height: 32px;" placeholder="         Product Name ">

    </div>
    
<div class="wrapper text-center">
    <button class="styledbutton"> Click Here To Get Suggestion </button>
</div>
    
<footer class="container-fluid text-center">
  <!--<a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>-->
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

  //for menu(appearing directly)
  
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  


//Ajax Call for menu icons

$(".menu-links").click(function() {
  var xhttp = new XMLHttpRequest();
  var id = $(this).attr('id');
  var set = $(this).attr('data-menu-set');
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      getMenu(this,id,set);
    }
  };
  xhttp.open("GET", "menu.xml", true);
  xhttp.send();

  function getMenu(xml,id,set) {
  	var i;
  	var menu = xml.responseXML;
  	var table = '<table class="table table-striped table-bordered table-hover table-condensed"><thead><tr><th><center>Item Name</center></th><th><center>Price</center></th></tr></thead><tbody>';
  	var x = menu.getElementsByTagName(id);
  	var item = x[0].getElementsByTagName('item');
  	//start loop
  	for (i = 0; i < item.length ; i++) { 
      table += "<tr><td>" +
      item[i].getElementsByTagName('name')[0].childNodes[0].nodeValue +
      "</td><td>" +
      item[i].getElementsByTagName('price')[0].childNodes[0].nodeValue +
      "</td></tr>";
    }//end for loop

  	table += '</tbody>';

  	if(set == 'upper') {
      $('#menu-links-lower').html(" ");
  		$('#menu-links-upper').html(table);
  	} else if(set == 'lower') {
      $('#menu-links-lower').html(" ");
  		$('#menu-links-lower').html(table);
  	}

  	//alert(item[0].getElementsByTagName('price')[0].childNodes[0].nodeValue);

  	//$('#menu-links-upper').html(x[0].getElementsByTagName('item')[0].childNodes[0].nodeValue );
  }
});

// Ajax call for search Bar


})
</script>

</body>
</html>
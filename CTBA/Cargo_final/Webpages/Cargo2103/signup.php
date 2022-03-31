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
          <a class="navbar-brand" href="index.php">Cargo Tracking</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
<!--
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#services">HOME</a></li>
            <li><a href="#order">ORDER</a></li>
            <li><a href="predict.php">PREDICT</a></li>
            <li><a href="#about">ABOUT US</a></li>
            <li><a href="#contact">CONTACT</a></li>
          </ul>
-->
        </div>
      </div>
    </nav>
    <?php
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "<p class='text-center' style='color:#ff3d3d;font-size: 20px;'>"."All Fields are required!";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = "<p class='text-center' style='color:#ff3d3d;font-size: 20px;'>".'Passwords should be same <br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "<p class='text-center' style='color:#ff3d3d;font-size: 20px;'>"."Invalid Email Address!";
		}
	}

	/* Validation to check if gender is selected */
	if(!isset($error_message)) {
	if(!isset($_POST["gender"])) {
	$error_message = "<p class='text-center' style='color:#ff3d3d;font-size: 20px;'>"."All Fields are required!";
	}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "<p class='text-center' style='color:#ff3d3d;font-size: 20px;'>"."Accept Terms and Conditions to Register!";
		}
	}

	if(!isset($error_message)) {
		// require_once("dbcontroller.php");
		// $db_handle = new DBController();
		require_once("connect.php");
		//$query = "INSERT INTO customer_info (Name, email, contact_no, business_type) VALUES
		//('" . $_POST["userName"] . "', '" . $_POST["password"] . "', '" . $_POST["userEmail"] . "', '" . $_POST["gender"] . "')";

		//for customer_info table//
		$query = "INSERT INTO customer_info (Name, email, contact_no, business_type) VALUES 
		('" . $_POST["userName"] . "','" . $_POST["userEmail"] . "', '" . $_POST["mobile"] . "', '" . $_POST["Btype"] . "')";
		$result = $mysqli->query($query);

		//for authentication table//
		$hash = md5($_POST["password"]);
		$query = "INSERT INTO authentication (email, password, hash) VALUES 
		('" . $_POST["userEmail"] . "','" . $_POST["password"] . "', '" . $hash . "')";
		$result2 = $mysqli->query($query);
		if(!empty($result) && !empty($result2)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$error_message = "<p class='text-center' style='color:#ff3d3d;font-size: 20px;'>"."Problem in registration. Try Again!";	
		}
	}
}
?>
    <div class="container-fluid">
		<form name="frmRegistration" method="post" action="">
			<?php if(!empty($success_message)) { ?>	
			<div class="success-message">
				<?php if(isset($success_message)) echo "<p class='text-center' style='color:#46b8da;font-size: 20px;'>".$success_message; ?>
			</div>
			<?php } ?>
			<?php if(!empty($error_message)) { ?>	
			<div class="error-message">
				<?php if(isset($error_message)) echo $error_message; ?>
			</div>
			<?php } ?>
			<div class="form-group">
				<label for="username">Name:</label>
				<input type="text" class="form-control" id="username" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
			</div>
			<!--<div class="form-group">
				<label for="firstname">First Name:</label>
				<input type="text" class="form-control" id="firstname" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
			</div>
			<div class="form-group">
				<label for="lastname">Last Name:</label>
				<input type="text" class="form-control" id="lastname" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>">
			</div>-->
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
			</div>
			<div class="form-group">
				<label for="cpwd">Confirm Password:</label>
				<input type="password" class="form-control" id="cpwd" name="confirm_password" value="<?php if(isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" id="email" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
			</div>
			<div class="form-group">
				<label for="Mobile">Mobile No.:</label>
				<input type="number" class="form-control" id="mobile" name="mobile" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>">
			</div>
			<div class="form-group">
				<label for="Business Type">Business Type:</label>
				<input type="text" class="form-control" id="Btype" name="Btype" value="<?php if(isset($_POST['Btype'])) echo $_POST['Btype']; ?>">
			</div>
			<div class="form-group">
				<label>Gender:&nbsp;&nbsp;&nbsp;</label>
				<label class="radio-inline">
					<input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
				</label>
				<label class="radio-inline">
					<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
				</label> 
			</div>
			<!-- REMOVE THE GENDER AND TERMS AND CONDITIONS. No need-->
			<div class="checkbox">
				<label><input type="checkbox" name="terms"> I accept Terms and Conditions </label>
			</div>
			<div class="pull-right">
				<a href="login.php">Already Registered?</a>
			</div>
			<button type="submit" name="register-user" value="Register" class="btn btn-primary">Register</button>
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
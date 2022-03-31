


<?php
include 'connect.php';
session_start();
if(!empty($_POST["login-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message ="All Fields are required";
		break;
		}
	}

	 if(!isset($error_message)) {
		/*require_once("dbcontroller.php");
		$db_handle = new DBController();
		$query = "SELECT * FROM registered_users WHERE user_name=".$_POST['userName']." and password=".$_POST['password'];

		$result = $db_handle->numRows($query);
		if($result>0) {
			$error_message = "";
			$success_message = "You have logged in successfully!";	
			unset($_POST);
		} else {
			$error_message = "Problem in logging in. Try Again!";	
		}*/
		$hash = md5($_POST['password']);
		$email = $_POST['email'];

		$sql = "SELECT * FROM authentication WHERE email = '$email'";
		$result = $mysqli->query($sql);

		$sql = "SELECT * FROM customer_info WHERE email = '$email'";
		$result2 = $mysqli->query($sql);

		if($result && $result2){
			if(($result->num_rows == 1) && ($result2->num_rows == 1)){
				$data = $result->fetch_assoc();
				$data2 = $result2->fetch_assoc();
				if($hash == $data['hash']){
					$_SESSION['isActive'] = 1;
					$_SESSION['email'] = $data['email'];
					$_SESSION['name'] = $data2['Name'];
					$_SESSION['contact']=$data2['contact'];
					header("Location: index.php");
				} else {
					$error_message =  "Password not matched!";
				}
			} else {
				$error_message = "user doesn't exist!";
			}
		} else {
			$error_message =  "Table Dosen't Exist";
		}
	}

	// else{		
	// 			// Prepare a select statement
	// 			$sql = "SELECT * FROM authentication WHERE email='".$_POST['email']."'";
				
	// 			$array='';
	// 			//echo $sql; die();

	// 			$result=$conn->query($sql);
	// 			 //$result; die();

	// 				$rows=$result->fetch_assoc();
	// 				//print_r($rows); print_r($_POST); die();

	// 				if($result->num_rows>0 && ($_POST['password']===$rows['password']))
	// 				{
	// 						$sql = "SELECT * FROM customer_info WHERE email='".$_POST['email']."'";
	// 						$result2=$conn->query($sql);
	// 						$rows2=$result2->fetch_assoc();

	// 						$_SESSION['name']=$rows2['Name'];
	// 						$_SESSION['isActive']="true";
	// 						$_SESSION['email']=$rows2['email'];
	// 						$_SESSION['contact']=$rows2['contact'];
	// 						header('Location:index.php');
	// 				}

	// 				else
	// 				{
	// 					//echo "all is well"; die;
	// 					$_SESSION["isActive"]="false";
	// 					$_POST=array();
	// 					header('Location:index.php');

	// 				}
		
	// }

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
		<div class="container">
		<form name="frmLogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<?php
			    // alert
			// <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			    if(isset($error_message)){ 
			      echo '<div class="alert alert-danger alert-dismissable" style= "margin-top:7.5%;">
			              <span class="glyphicon glyphicon-exclamation-sign"></span><span 
			              style= "padding-left: 11px;">'.$error_message.'</span>
			            </div>';
			      $error_message = null;
			    }
			    //  alert end
			?>
			<div class="form-group">
				<!--JAYESH's NOTE: I replaced Name with email cause login me email chahie. Copy paste the content of email validation here from signup page -->
				<br><br><br>
				<label for="email">Email:</label>
				<input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name="password" value="">
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="keeplog"> Keep me Logged In </label>
			</div>
			<button type="submit" name="login-user" value="Login" class="btn btn-primary">Log In</button>
			<div class="pull-right">
				<a href="signup.php">Haven't Registered?</a>
			</div>
			
		</form>
	</div>
</body>
</html>









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
<?php
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	/* Validation to check if gender is selected */
	if(!isset($error_message)) {
	if(!isset($_POST["gender"])) {
	$error_message = " All Fields are required";
	}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
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
			$error_message = "Problem in registration. Try Again!";	
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Cargo Tracking</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>          <a class="navbar-brand" style=" margin-bottom: 0;
          margin-top: 2%;
      background-color: #f5822B;
      z-index: 9999;
      border: 0;
      font-size: 24px !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;" href="index.php#myPage">Home</a>
          <br>
	<div class="container">
		<form name="frmRegistration" method="post" action="">
			<?php if(!empty($success_message)) { ?>	
			<div class="success-message">
				<?php if(isset($success_message)) echo $success_message; ?>
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
</body>
</html>
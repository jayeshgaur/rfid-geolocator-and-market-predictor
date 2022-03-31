<?php
include 'connect.php';
session_start();
if(!empty($_POST["login-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
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
<html>
<head>
	<title>Login Page</title>
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
		<form name="frmLogin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<?php
			    // alert
			// <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			    if(isset($error_message)){ 
			      echo '<div class="alert alert-danger alert-dismissable">
			              <span class="glyphicon glyphicon-exclamation-sign"></span><span 
			              style="padding-left: 11px;">'.$error_message.'</span>
			            </div>';
			      $error_message = null;
			    }
			    //  alert end
			?>
			<div class="form-group">
				<!--JAYESH's NOTE: I replaced Name with email cause login me email chahie. Copy paste the content of email validation here from signup page -->
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
			<div class="pull-right">
				<a href="signup.php">Haven't Registered?</a>
			</div>
			<button type="submit" name="login-user" value="Login" class="btn btn-primary">Log In</button>
		</form>
	</div>
</body>
</html>
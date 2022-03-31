<?php 
 require '_mailer/PHPMailerAutoload.php';
  include("_mailer/class.phpmailer.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])){
	switch ($_POST['action']) {
		case 'insertRfIdLog':
		insertRfIdLog();
		break;

		case 'showLogs':
		showLogs();

		default:

		break;
	}
}


function insertRfIdLog() {
    include 'connect.php';
      include 'connectmail.php';
    $cardid = $_POST['cardid'];
    $time = time();
 //    UPDATE tracking
	// SET `Checkpoint 1` = 1
	// WHERE rfid = '$cardid';
	//echo $cardid;
	date_default_timezone_set('Asia/Calcutta');
	$date = date('m/d/Y h:i:s a', time());
    //$stmt = $conn->prepare("INSERT INTO `tracking`(`Checkpoint 1`, `c1_datetime`) VALUES (1, :dt)");
    $stmt = $conn->prepare("UPDATE tracking	SET `SUCCESS` = 1 WHERE rfid = '$cardid';");


    	$sql = "SELECT * FROM orders WHERE rfid=".$cardid."";
	$result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];

      $account="ctbakjsce@gmail.com";//email id from which email is being sent (Sender's email)
      $password="cargo2019";
      $reply_to = $row['email'];//emailid on which email is to be sent(Receiver)
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth= true;
      $mail->Port = 465; // Or 587
      $mail->Username= $account;
      $mail->Password= $password;
      $mail->SMTPSecure = 'ssl';
      $mail->setFrom($email, 'Cargo Tracing and Business Analysis');
      $mail->isHTML(true);
      $mail->addAddress($email);
      $mail->addReplyTo($reply_to, 'No-reply');
      $msg = "<h1 style='color:#46b8da;'>Thank you for using our services. Hope to see you again!</h1><br>";
      $subject = "Cargo Tracing and Business Analysis. Cargo collected at destination ";
      $mail->Body = $msg;
      $mail->Subject = $subject;
//    echo $account;
//    echo $reply_to;
    
      if(!$mail->send())
      {
        // echo "Mailer Error: " . $mail->ErrorInfo;
        
      }
      else
      {
        // echo "E-Mail has been sent.";
       
      }




    // $stmt->bindParam(":card", $cardid);
    // $stmt->bindParam(":dt", $time);
	$stmt->execute();

	$stmt3 = $conn->prepare("DELETE FROM tracking WHERE rfid = '$cardid';");
	$stmt3->execute();

	$stmt4 = $conn->prepare("DELETE FROM orders WHERE rfid = '$cardid';");
	$stmt4->execute();

//	echo $cardid;

	$sql = "SELECT * FROM orders WHERE rfid=".$cardid."";
	$result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
     
      $account="ctbakjsce@gmail.com";//email id from which email is being sent (Sender's email)
      $password="cargo2019";
      $reply_to = $row['email'];//emailid on which email is to be sent(Receiver)
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth= true;
      $mail->Port = 465; // Or 587
      $mail->Username= $account;
      $mail->Password= $password;
      $mail->SMTPSecure = 'ssl';
      $mail->setFrom($email, 'Cargo Tracing and Business Analysis');
      $mail->isHTML(true);
      $mail->addAddress($email);
      $mail->addReplyTo($reply_to, 'No-reply');
      $msg = "<h1 style='color:#46b8da;'>Thank you for using our services. Hope to see you again!</h1><br>";
      $subject = "Cargo Tracing and Business Analysis. Cargo collected at destination ";
      $mail->Body = $msg;
      $mail->Subject = $subject;
//    echo $account;
//    echo $reply_to;
    
      if(!$mail->send())
      {
        // echo "Mailer Error: " . $mail->ErrorInfo;
        
      }
      else
      {
        // echo "E-Mail has been sent.";
       
      }



	echo "success";
}

function showLogs()
{
	include 'connect.php';

	$logs = $conn->query("SELECT * FROM `tbllogs`");
	while($r = $logs->fetch()){
		echo "<tr>";
		echo "<td>".$r['logid']."</td>";
		echo "<td>".$r['cardid']."</td>";
		$dateadded = date("F j, Y, g:i a", $r["logdate"]);
		echo "<td>".$dateadded."</td>";
		echo "</tr>";
	}
}

?>

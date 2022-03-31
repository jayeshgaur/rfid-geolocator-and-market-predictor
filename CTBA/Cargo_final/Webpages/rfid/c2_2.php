<?php

  require '_mailer/PHPMailerAutoload.php';
  include("_mailer/class.phpmailer.php");?>
  
  <?php 
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
    $cardid = $_POST['cardid'];
    $time = time();
 //    UPDATE tracking
	// SET `Checkpoint 1` = 1
	// WHERE rfid = '$cardid';
	//echo $cardid;
	date_default_timezone_set('Asia/Calcutta');
	$date = date('m/d/Y h:i:s a', time());
    //$stmt = $conn->prepare("INSERT INTO `tracking`(`Checkpoint 1`, `c1_datetime`) VALUES (1, :dt)");
    $stmt = $conn->prepare("UPDATE tracking	SET `Checkpoint 2` = 1 WHERE rfid = '$cardid';");
   $stmt2 = $conn->prepare("UPDATE tracking	SET `c2_datetime` = '$date' WHERE rfid = '$cardid';");
 
$sql1 = "SELECT * FROM order WHERE rfid=".$_POST['cardid']."";    
$result1 = $mysqli->query($sql);
if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc())
    {
        $email = row1['email']       ;
    }
}
    
    
    // $stmt->bindParam(":card", $cardid);
    // $stmt->bindParam(":dt", $time);
	$stmt->execute();
	$stmt2->execute();
//	echo $cardid;
      $account="saurabhbaj222@gmail.com";//email id from which email is being sent (Sender's email)
      $password="vaishali@222";
      $reply_to = $email;//emailid on which email is to be sent(Receiver)
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
      $msg = "<h1 style='color:#46b8da;'>Welcome!Your Shipment is has passed from checkpoint 2!</h1><br>";
      $subject = "Tracked Shipment ";
      $mail->Body = $msg;
      $mail->Subject = $subject;

      if(!$mail->send())
      {
        // echo "Mailer Error: " . $mail->ErrorInfo;
        return 0;
      }
      else
      {
        // echo "E-Mail has been sent.";
        return 1;
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

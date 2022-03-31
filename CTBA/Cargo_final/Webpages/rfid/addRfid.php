
<?php
include 'connectmail.php';
 require '_mailer/PHPMailerAutoload.php';
  include("_mailer/class.phpmailer.php");
session_start();
$rfid = $_POST['rfid'];
$on = $_POST['orderno'];

$link = mysqli_connect("localhost", "root", "", "beproject");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "INSERT INTO tracking (order_no, rfid) VALUES ('$on','$rfid')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully to tracking table ";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}


$sql = "UPDATE orders SET `rfid` = '$rfid' WHERE order_no = '$on'";
if(mysqli_query($link, $sql)){
    echo "Records updated successfully in orders table. ";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 
$sql = "DELETE FROM tbllogs WHERE `rfid` = '$rfid' ";
if(mysqli_query($link, $sql)){
    echo "Tag deleted successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

	$sql = "SELECT * FROM orders WHERE order_no=".$on."";
	$result = $mysqli->query($sql);
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];

      $account="saurabhbaj222@gmail.com";//email id from which email is being sent (Sender's email)
      $password="vaishali@222";
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
      $msg = "<h1 style='color:#46b8da;'>We have your cargo which will be shipped soon.</h1><br>";
      $subject = "Cargo Tracing and Business Analysis. Shipment Received! ";
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



?>
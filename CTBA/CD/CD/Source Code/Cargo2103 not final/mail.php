<?php
  require '_mailer/PHPMailerAutoload.php';
  include("_mailer/class.phpmailer.php");
  // $json = file_get_contents('php://input');
  // $obj = json_decode($json,true);
  // $contactsj = $obj['contacts'];
  // $emails = $obj['emails'];

      $account="saurabhbaj222@gmail.com";
      $password="vaishali@222";
      // $to="v.limbani@somaiya.edu";
      // $from="somaiya.trust@somaiya.edu";
      // $from_name="Rival";
      $reply_to = "saurabh.baj@somaiya.edu";
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth= true;
      $mail->Port = 465; // Or 587
      $mail->Username= $account;
      $mail->Password= $password;
      $mail->SMTPSecure = 'ssl';
      // $mail->From = $from;
      // $mail->FromName= $from_name;
      $mail->setFrom("saurabh.baj@somaiya.edu", 'Proctor monitoring');
      $mail->isHTML(true);
      $mail->addAddress("saurabh.baj@somaiya.edu");
      $mail->addReplyTo($reply_to, 'No-reply');
      $msg = "<h1 style='color:#46b8da;'>Welcome to proctor monitoring!</h1><br>
      <h3>Username : </h3><span>".$username."</span><br>
      <h3>Password : </h3><span>".$password."</span>";
      $subject = "Proctor monitoring";
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
?> 

















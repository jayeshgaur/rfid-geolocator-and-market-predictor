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
    $cardid = $_POST['cardid'];
    $time = time();
	
    $stmt = $conn->prepare("INSERT INTO `tbllogs`(`rfid`, `logdate`) VALUES (:card, :dt)");
    $stmt->bindParam(":card", $cardid);
    $stmt->bindParam(":dt", $time);
	$stmt->execute();

echo "success";
} 


function showLogs()
{
	include 'connect.php';

	$logs = $conn->query("SELECT * FROM `tbllogs`");
	while($r = $logs->fetch()){
		echo "<tr>";
	//	echo "<td>".$r['rfid']."</td>"; ?>
		<form name="update" action="addRfid.php" method="POST">
			<td><input type="text" name="rfid" id="rfid" value="<?php echo $r['rfid'] ?>" readonly></td>
		<?php
		$dateadded = date("F j, Y, g:i a", $r["logdate"]);
		echo "<td>".$dateadded."</td>"
		 ?> 
		
		<td><input type="number" name="orderno" id="orderno"></td>


		<td><button type="submit" class="btn btn-primary">Submit</td>

	</form>
		<?php 
		echo "</tr>";
	}
}

?>

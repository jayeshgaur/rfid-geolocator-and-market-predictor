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

    //$stmt = $conn->prepare("INSERT INTO `tracking`(`Checkpoint 1`, `c1_datetime`) VALUES (1, :dt)");
    $stmt = $conn->prepare("UPDATE tracking	SET `Checkpoint 1` = 1 WHERE rfid = '$cardid';");
    $stmt->bindParam(":card", $cardid);
    $stmt->bindParam(":dt", $time);
	$stmt->execute();
//	echo $cardid;
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

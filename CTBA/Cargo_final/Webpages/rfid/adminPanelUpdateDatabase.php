</<?php 

$rfid = $_GET['rfid'];
echo $r['rfid'];

 ?>

<html>
<head>
<title> Admin Panel </title></head>
<body>
	<h3> assign rfid to order</h3>
	<form action="addRfid.php" method="POST">
RFID Value: <input name = "rfid" type="text">
Order Number : <input type="text" name="order_no">
<input type="submit" value = "Submt" name="submit">
</form>

<h3> delete rfid from database</h3>
	<form action="deleteRfid.php" method="POST">
RFID Value: <input name = "rfid" type="text">
<input type="submit" value = "Submt" name="submit">

</form>
</body>
</html>
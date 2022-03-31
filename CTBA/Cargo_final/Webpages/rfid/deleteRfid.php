
<?php

$rfid = $_POST['rfid'];

$link = mysqli_connect("localhost", "root", "", "beproject");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "DELETE FROM tbllogs WHERE `rfid` = '$rfid' ";
if(mysqli_query($link, $sql)){
    echo "Tag deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



mysqli_close($link);
?>
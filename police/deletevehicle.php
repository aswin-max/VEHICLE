<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "delete from vehicle where vid=".$bid;

$conn->query($sql);

 header('location:viewvehicle.php');



?>


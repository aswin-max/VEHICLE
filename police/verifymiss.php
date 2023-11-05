<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "update missing set status=2  where mid=".$bid;

$conn->query($sql);

 header('location:viewmiss.php');



?>

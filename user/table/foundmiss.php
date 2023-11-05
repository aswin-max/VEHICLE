<?php	
include("../dbcon.php");
$bid = $_GET['id'];
$sql = "update missing set status=3  where mid=".$bid;

$conn->query($sql);

 header('location:viewmiss.php');



?>

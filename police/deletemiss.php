<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "delete from missing where mid=".$bid;

$conn->query($sql);

 header('location:viewmiss.php');



?>

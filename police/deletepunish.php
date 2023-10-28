<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "delete from punish where pid=".$bid;

$conn->query($sql);

 header('location:viewpunish.php');



?>


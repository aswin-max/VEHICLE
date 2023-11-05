<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "delete from epunish where pid=".$bid;

$conn->query($sql);

 header('location:viewepunish.php');



?>


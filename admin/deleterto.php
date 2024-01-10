

<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "update rto set status=2 where  rid=".$bid;

$conn->query($sql);

 header('location:viewrto.php');



?>


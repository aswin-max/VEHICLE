

<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "update officer set status=2 where  offid=".$bid;

$conn->query($sql);

 header('location:viewofficer.php');



?>


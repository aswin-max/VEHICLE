

<?php	
include("dbconn.php");
$bid = $_GET['id'];
$sql = "update fine set status=2 where  fine_id=".$bid;

$conn->query($sql);

 header('location:viewoffence.php');



?>


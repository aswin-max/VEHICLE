

<?php	
include("dbcon.php");
$pid = $_GET['id'];

$sql123 = "select * from punishment where pid=$pid" ;
$result123 = $conn->query($sql123);
$row = $result123->fetch_assoc();
       $_SESSION['amount']=$row[0]['amount'];
       echo "<script> alert('Payment ');</script> ";

$conn->query($sql);
$_SESSION['pid']=$pid;
echo $pid;
 header('location:payment.php');



?>


<html>

><head>
	<title>Login V17</title>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  <?php require('../../config/autoload.php'); ?>
<?php
$dao=new DataAccess();


//if(isset($_SESSION['name']))
   // header('location:student/index.php');



$elements=array("offuser"=>"","offpass"=>"");
$form=new FormAssist($elements,$_POST);
$rules=array(
    'offuser'=>array('required'=>true),
    'offpass'=>array('required'=>true),
);
$validator=new FormValidator($rules);

if(isset($_POST['login']))
{
    if($validator->validate($_POST))
    {
        $data=array('offuser'=>$_POST['offuser'],'offpass'=>$_POST['offpass']);
        if($info=$dao->login($data,'officer'))
        {
           
            $_SESSION['officer']=$info['offuser'];
$a=$_SESSION['officer'];

	echo "<script> alert('$a');</script> ";	
		
   echo"<script> location.replace('type.php'); </script>";
			
           // header('location:student/index.html');
       


 }
        else{
            $msg="invalid username or password";
			
				echo "<script> alert('Invalid username or password');</script> ";
        }
    }

    
}


?>
<form class="login" method="POST">
    <input type="text" name="offuser" placeholder="Username">
    <input type="password" name="offpass" placeholder="Password">
    <input type="submit" name="login" value="login" class="button">
  </form>
</body>
</html>
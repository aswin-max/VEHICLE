<?php 

 
 include("sidebar.php");

//session_start();
$elements=array(
        "todate"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("todate"=>"to Date");

$rules=array(
    
    "todate"=>array('required'=>true,'date'=>array('from'=>PHP_INT_MIN,'to'=>'today')),
    
    // "todate"=>array('required'=>true,'date'=>array('from'=>'today','to'=>'+30 days 12 am')),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
 $_SESSION['todate']=$_POST['todate'];
 print_r($_SESSION);

 echo"<script >location.href = 'epunishreport.php'</script>";



       
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" >
 


<div class="row">
                    <div class="col-md-6">
To Date:
<?= $form->inputBox('todate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('todate'); ?></span>


</div>
</div>





<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>
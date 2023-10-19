<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");


$elements=array(
    "vid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('vid'=>"Vehicle Number");

$rules=array("vid"=>array("required"=>true)
);
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
    $_SESSION['vid']=$_POST["vid"];
    $_SESSION['amount']=$_POST["amount"];
   {
       echo"<script> location.replace('taxview.php');</script>";
  }
    
}





?>

<div class="container">
            <div class="row">
<div class="col-sm-8">
  

 <form action="" method="POST" ><br>

 <H1><U>REGISTERED VEHICLE NUMBER   </U></H1>
 <div class="row">
                    <div class="col-md-6">

Vehicle Number

<?= $form->textBox('vid',array('class'=>'form-control')); ?>
<?= $validator->error('vid'); ?>

</div>
</div>


<br>
<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>





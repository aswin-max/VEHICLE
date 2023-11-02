<?php 

 require('../config/autoload.php'); 
 include("sidebar.php");
$dao=new DataAccess();
$info=$dao->getData('*','fine','fine_id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
    "OFFENCE"=>$info[0]['offence'],"AMOUNT"=>$info[0]['amount']);


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('offence'=>"OFFENCE",'amount'=>"AMOUNT");

$rules=array(
    "OFFENCE"=>array("required"=>true,"alphaspaceonly"=>true),
    "AMOUNT"=>array("required"=>true,"integeronly"=>true)


     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'offence'=>$_POST['OFFENCE'],

        'amount'=>$_POST['AMOUNT'],
         
    );
    $condition='fine_id='.$_GET['id'];

    if($dao->update($data,'fine',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>



<?php
    
}
else
echo $file->errors();
}                                                                                                                                                                                                                                                                                                                            
?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">


<div class="row">
                    <div class="col-md-6">
OFFENCE:

<?= $form->textBox('OFFENCE',array('class'=>'form-control')); ?>
<?= $validator->error('OFFENCE'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
AMOUNT:

<?= $form->textBox('AMOUNT',array('class'=>'form-control')); ?>
<?= $validator->error('AMOUNT'); ?>

</div>
</div>


<a href="offence.php" ><button type="submit" name="insert">Update</button></a>
</form>


</body>

</html
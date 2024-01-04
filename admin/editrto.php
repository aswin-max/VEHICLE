<?php 


 include("sidebar.php");
$dao=new DataAccess();
$info=$dao->getData('*','rto','rid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
    "regid"=>$info[0]['regid'],"rname"=>$info[0]['rname']);


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('regid'=>"regid",'rname'=>"rname");

$rules=array(
    "regid"=>array("required"=>true,"alphaspaceonly"=>true),
    "rname"=>array("required"=>true,"integeronly"=>true)


     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'regid'=>$_POST['regid'],

        'rname'=>$_POST['rname'],
         
    );
    $condition='rid='.$_GET['id'];

    if($dao->update($data,'rto',$condition))
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
regid:

<?= $form->textBox('regid',array('class'=>'form-control')); ?>
<?= $validator->error('regid'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
rname:

<?= $form->textBox('rname',array('class'=>'form-control')); ?>
<?= $validator->error('rname'); ?>

</div>
</div>


<a href="regid.php" ><button type="submit" name="insert">Update</button></a>
</form>


</body>

</html
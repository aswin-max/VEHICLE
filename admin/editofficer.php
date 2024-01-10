<?php 


 include("sidebar.php");
$dao=new DataAccess();
$info=$dao->getData('*','officer','offid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
    "offid" =>$info[0]['offid'],"offuser"=>$info[0]['offuser'],"offpass"=>$info[0]['offpass'],"rid"=>$info[0]['rid'],"offimg"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('offuser'=>"offuser",'offpass'=>"offpass");

$rules=array(
    "offuser"=>array("required"=>true,"alphaspaceonly"=>true),
    "offpass"=>array("required"=>true),
    "rid"=>array("required"=>true),
    "offimg"=>array("filerequired"=>true)


     
);
    
    
$validator = new FormValidator($rules,$labels);

if (isset($_POST["insert"])) 
{
    if ($validator->validate($_POST)) 
    {
        if($fileName=$file->doUploadRandom($_FILES['offimg'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {
      
    
$data=array(

        'offuser'=>$_POST['offuser'],
        'offpass'=>$_POST['offpass'],
        'rid'=>$_POST['rid'],
        'offimg'=>$fileName
    );
    $condition='offid='.$_GET['id'];

    if($dao->update($data,'officer',$condition))
    {
        $msg="Successfullly Updated";
        echo"<script> location.replace('/vehicle/admin/viewofficer.php'); </script>";

    }
    else
        {$msg="Failed";} 
    } 
    
}
}
else 
    {
        echo $file->errors();
    }
?>




<?php
    
                                                                                                                                                                                                                                                                                                                        
?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 <div class="row">
                    <div class="col-md-6">
RTO:

<?php
                    $options = $dao->createOptions('rname','rid',"rto");
                    echo $form->dropDownList('rid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('rid'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
offuser:

<?= $form->textBox('offuser',array('class'=>'form-control')); ?>
<?= $validator->error('offuser'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
offpass:

<?= $form->textBox('offpass',array('class'=>'form-control')); ?>
<?= $validator->error('offpass'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
IMAGE:

<?= $form->fileField('offimg',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('offimg'); ?></span>


</div>
</div>

<a href="offuser.php" ><button type="submit" name="insert">Update</button></a>
</form>


</body>

</html
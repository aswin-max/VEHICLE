<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "offname"=>"","offuser"=>"","offpass"=>"","offimg"=>"","rid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('offname'=>"offname",'offuser'=>"offuser",'offpass'=>"offpass",'offimg'=>"offimg",'rid'=>"rname");

$rules=array(
    "offname"=>array("required"=>true,"alphaspaceonly"=>true),
    "offuser"=>array("required"=>true,"maxlength"=>10),
    "offpass"=>array("required"=>true,"minlength"=>6,"maxlength"=>14),
    "offimg"=>array("filerequired"=>true),
    "rid"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	if($fileName=$file->doUploadRandom($_FILES['offimg'],array('.jpg','.png','.jpeg'),100000,1,'../upload'))	
    {


$data=array(

        'offname'=>$_POST['offname'],
        'offuser'=>$_POST['offuser'],
        'offpass'=>$_POST['offpass'],
         'rid'=>$_POST['rid'],
         'offimg'=>$fileName
         
    );

    print_r($data);
  
    if($dao->insert($data,"officer"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>



<?php
    
}
else
echo $file->errors();    
}
}                                                                                                                                                                                                                                                                                                                        
?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

 rto:

<?php
     $options = $dao->createOptions('rname','rid',"rto");
     echo $form->dropDownList('rid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('rid'); ?>



<div class="row">
                    <div class="col-md-6">
offname:

<?= $form->textBox('offname',array('class'=>'form-control')); ?>
<?= $validator->error('offname'); ?>

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
offimage:

<?= $form->fileField('offimg',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('offimg'); ?></span>

</div>
</div>


<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
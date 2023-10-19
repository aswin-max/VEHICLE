<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");

$file=new FileUpload();
$elements=array(
  "name"=>"","address"=>"","license"=>"","rc"=>"","insrns"=>"","polltn"=>"","fp"=>"");



$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("name"=>"Owner Name","address"=>"Owner Address","license"=>"Owner License","rc"=>"Rc Book","insrns"=>"Insurance","polltn"=>"Pollution","fp"=>"Fitness paper");

   
$rules=array("name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true,),
   "address"=>array("required"=>true,"minlength"=>3,"maxlength"=>200,),
   "license"=> array('filerequired'=>true),
  "rc"=> array("filerequired"=>true),
  "insrns"=> array("filerequired"=>true),
  "polltn"=> array("filerequired"=>true),
  "fp"=> array("filerequired"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

if($validator->validate($_POST))
{
    if($fileName=$file->doUploadRandom($_FILES['license'],array('.pdf','.docx'),100000,5,'../uploads'))	
    {
        $fileName1=$file->doUploadRandom($_FILES['rc'],array('.pdf','.docx'),100000,5,'../uploads');
        $fileName1=$file->doUploadRandom($_FILES['insrns'],array('.pdf','.docx'),100000,5,'../uploads');
        $fileName1=$file->doUploadRandom($_FILES['polltn'],array('.pdf','.docx'),100000,5,'../uploads');
        $fileName1=$file->doUploadRandom($_FILES['fp'],array('.pdf','.docx'),100000,5,'../uploads');
        $validator = new FormValidator($rules,$labels);

$data=array(

  'name'=>$_POST['name'],
  'address'=>$_POST['address'],
  'license'=>$fileName,
  'rc'=>$fileName,
  'insrns'=>$_POST['insrns'],
  'polltn'=>$_POST['polltn'],
  'fp'=>$_POST['fp'],
    );
  
    if($dao->insert($data,"dcmnt"))
    {
        echo "<script> alert('New record created successfully');</script> ";
//header('location:studentdetails.php');
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
 
<div class="row">
                    <div class="col-md-6">
                    OWNER NAME 

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<?= $validator->error('name'); ?>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
OWNER'S ADDRESS :

<?= $form->textBox('address',array('class'=>'form-control')); ?>
<?= $validator->error('address'); ?>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
                                   
LICENSE

<?=$form->fileField('license',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('license'); ?></span>

</div>
</div>


<div class="row">
                   <div class="col-md-6">	
RC BOOK

<?=$form->fileField('rc',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('rc'); ?></span>

</div>
</div>


<div class="row">
                   <div class="col-md-6">				
INSURANCE

<?= $form->fileField('insrns',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('insrns'); ?></span>

</div>
</div>
                   
<div class="row">
                   <div class="col-md-6">
                                       
               
POLLUTION PAPER

<?= $form->fileField('polltn',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('polltn'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
FITNESS PAPER

<?= $form->fileField('fp',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('fp'); ?></span>

</div>
</div>







<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>



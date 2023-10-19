<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "vrno"=>"","tid"=>"","vname"=>"","rid"=>"","vehiclename"=>"","fid"=>"","color"=>"","dor"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('vrno'=>"vrno",'tid'=>"tname",'vname'=>"vname",'rid'=>"rname",'vehiclename'=>"vehiclename",'fid'=>"fname",'color'=>"color",'dor'=>"dor");

$rules=array(
    "tid"=>array("required"=>true),
    "vrno"=>array("required"=>true),
    "vname"=>array("required"=>true,"alphaspaceonly"=>true),
    "rid"=>array("required"=>true),
    "fid"=>array("required"=>true),
    "vehiclename"=>array("required"=>true),
    "color"=>array("required"=>true,"alphaonly"=>true),
    "dor"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    

$data=array(

        'tid'=>$_POST['tid'],
        'vrno'=>$_POST['vrno'],
        'vname'=>$_POST['vname'],
        'rid'=>$_POST['rid'],
        'fid'=>$_POST['fid'],
        'vehiclename'=>$_POST['vehiclename'],
        'color'=>$_POST['color'],
        'dor'=>$_POST['dor']
    );

    print_r($data);
  
    if($dao->insert($data,"vehicle"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} 




    
}
}
else
echo $file->errors();
                                                                                                                                                                                                                                                                                                                           
?>
<html>
<head>
</head>
<body>

 <form  method="POST" encvehicle="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
TYPE:

<?php
                    $options = $dao->createOptions('tname','tid',"type");
                    echo $form->dropDownList('tid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('tid'); ?>

</div>
</div>

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
VEHICLE RC NUMBER:

<?= $form->textBox('vrno',array('class'=>'form-control')); ?>
<?= $validator->error('vrno'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
OWNER NAME:

<?= $form->textBox('vname',array('class'=>'form-control')); ?>
<?= $validator->error('vname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
VEHICLE NAME:

<?= $form->textBox('vehiclename',array('class'=>'form-control')); ?>
<?= $validator->error('vehiclename'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
FUEL:

<?php
                    $options = $dao->createOptions('fname','fid',"fuel");
                    echo $form->dropDownList('fid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('fid'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
COLOR:

<?= $form->textBox('color',array('class'=>'form-control')); ?>
<?= $validator->error('color'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
DATE:

<input type="date" name="dor">
</div>
</div>
<input type="submit" name="insert" value="submit">
</form>


</body>

</html>
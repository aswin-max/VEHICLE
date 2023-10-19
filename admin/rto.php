<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "rname"=>"","regid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('rname'=>"rname",'regid'=>"regid");

$rules=array(
    "rname"=>array("required"=>true,"alphaonly"=>true),
    "regid"=>array("required"=>true)


     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

    'regid'=>$_POST['regid'],

        'rname'=>$_POST['rname']
         
    );

    print_r($data);
  
    if($dao->insert($data,"rto"))
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
?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">



<div class="row">
                    <div class="col-md-6">
rname:

<?= $form->textBox('rname',array('class'=>'form-control')); ?>
<?= $validator->error('rname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
regid:

<?= $form->textBox('regid',array('class'=>'form-control')); ?>
<?= $validator->error('regid'); ?>

</div>
</div>


<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "vno"=>"","fine_id"=>"","tid"=>"","rid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('vno'=>"vno",'fine_id'=>"fine_id",'tid'=>"typename","rid"=>"rtoname");

$rules=array(
    "vno"=>array("required"=>true,"alphaspaceonly"=>true),
    "fine_id"=>array("required"=>true),
    "tid"=>array("required"=>true),
    "rid"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'vno'=>$_POST['vno'],

        'fine_id'=>$_POST['fine_id'],
        'tid'=>$_POST['tid'],
        'rid'=>$_POST['rid']
         
    );

    print_r($data);
  
    if($dao->insert($data,"punish"))
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

 type:

<?php
     $options = $dao->createOptions('tname','tid',"type");
     echo $form->dropDownList('tid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('tid'); ?>

Offence:

<?php
     $options = $dao->createOptions('offence','fine_id',"fine");
     echo $form->dropDownList('fine_id',array('class'=>'form-control'),$options); ?>
<?= $validator->error('fine_id'); ?>
<div class="row">
                    <div class="col-md-6">
vno:

<?= $form->textBox('vno',array('class'=>'form-control')); ?>
<?= $validator->error('vno'); ?>

</div>
</div>
RTo:

<?php
     $options = $dao->createOptions('rname','rid',"rto");
     echo $form->dropDownList('rid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('rid'); ?>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
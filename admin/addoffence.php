<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "OFFENCE"=>"","AMOUNT"=>"","tid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('OFFENCE'=>"OFFENCE",'AMOUNT'=>"AMOUNT",'tid'=>"typename");

$rules=array(
    "OFFENCE"=>array("required"=>true,"alphaspaceonly"=>true),
    "AMOUNT"=>array("required"=>true,"integeronly"=>true),
    "tid"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'offence'=>$_POST['OFFENCE'],

        'amount'=>$_POST['AMOUNT'],
        'tid'=>$_POST['tid']
         
    );

    print_r($data);
  
    if($dao->insert($data,"fine"))
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


<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
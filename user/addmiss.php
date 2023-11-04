<?php 

 require('../config/autoload.php'); ?>
 <?php
 include("sidebar.php");
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

if(isset($_POST["reset"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'offence'=>$_POST['OFFENCE'],

        'amount'=>$_POST['AMOUNT'],
        'tid'=>$_POST['tid']
         
    );

   
  
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

 
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-description"></p>
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="addoffence.php">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">TYPE</label>
                    <div class="col-sm-9">
                    <?php
     $options = $dao->createOptions('tname','tid',"type");
     echo $form->dropDownList('tid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('tid'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">OFFENCE</label>
                    <div class="col-sm-9">
                    <?= $form->textBox('OFFENCE',array('class'=>'form-control')); ?>
<?= $validator->error('OFFENCE'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">AMOUNT</label>
                    <div class="col-sm-9">
                    <?= $form->textBox('AMOUNT',array('class'=>'form-control')); ?>
<?= $validator->error('AMOUNT'); ?>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2" name="reset">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>


</body>

</html>
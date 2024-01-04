<?php 


 include("sidebar.php");
$file=new FileUpload();
$elements=array(
        "offuser"=>"","offpass"=>"","offimg"=>"","rid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('offuser'=>"offuser",'offpass'=>"offpass",'offimg'=>"offimg",'rid'=>"rname");

$rules=array(
    
    "offuser"=>array("required"=>true),
    "offpass"=>array("required"=>true,"minlength"=>6,"maxlength"=>14),
    "offimg"=>array("filerequired"=>true),
    "rid"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["reset"]))
{

if($validator->validate($_POST))
{
	if($fileName=$file->doUploadRandom($_FILES['offimg'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {


$data=array(

        
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

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-description"></p>
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="officer.php">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">RTO</label>
                    <div class="col-sm-9">
                    <?php
     $options = $dao->createOptions('rname','rid',"rto");
     echo $form->dropDownList('rid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('rid'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">NAME</label>
                    <div class="col-sm-9">
                    <?= $form->textBox('offuser',array('class'=>'form-control')); ?>
<?= $validator->error('offuser'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">PASSWORD</label>
                    <div class="col-sm-9">
                    <?= $form->textBox('offpass',array('class'=>'form-control')); ?>
<?= $validator->error('offpass'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">IMAGE</label>
                    <div class="col-sm-9">
                    <?= $form->fileField('offimg', array('class' => 'form-control')); ?>
                            <span style="color:red;"><?= $validator->error('offimg'); ?></span>
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
<?php include("footer.php"); ?>
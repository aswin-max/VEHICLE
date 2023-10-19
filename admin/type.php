<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "tname"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('tname'=>"tname");

$rules=array(
    "tname"=>array("required"=>true,"alphaonly"=>true)


     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       

        'tname'=>$_POST['tname'],
         
    );

    print_r($data);
  
    if($dao->insert($data,"type"))
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
tname:

<?= $form->textBox('tname',array('class'=>'form-control')); ?>
<?= $validator->error('tname'); ?>

</div>
</div>


<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
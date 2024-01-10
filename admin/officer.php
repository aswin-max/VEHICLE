<?php 


 include("sidebar.php");
$file=new FileUpload();
$elements=array(
        "offuser"=>"","offpass"=>"","offimg"=>"","rid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('offuser'=>"offuser",'offpass'=>"offpass",'offimg'=>"offimg",'rid'=>"rname");

$rules=array(
    "rid"=>array("required"=>true),
    "offuser"=>array("required"=>true),
    "offpass"=>array("required"=>true,"minlength"=>6,"maxlength"=>14),
    "offimg"=>array("filerequired"=>true),
    

     
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

  
  
    if($dao->insert($data,"officer"))
    {
        $successMessage = 'New record created successfully';
        $_POST['offuser'] = ''; 
        $_POST['offpass'] = '';
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
<script>
        // JavaScript function to clear the success message
        function clearSuccessMessage() {
            document.getElementById('successMessage').style.display = 'none';
        }
    </script>
    <!-- Include any additional head elements such as stylesheets, scripts, etc. -->
</head>
<body>

<?php
// Check if the successMessage variable is set and not empty
if (!empty($successMessage)) {
    echo "<div id='successMessage' style='color: green; display: block;'>{$successMessage}</div>";
    echo "<script>setTimeout(function() { clearSuccessMessage(); }, 2000);</script>"; // Invoke the JavaScript function after 2 seconds
}
?>
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
                        $options = $dao->createOptions('rname', 'rid', "rto");
                        echo $form->dropDownList('rid', array('class' => 'form-control'), $options);
                        ?>
                        <?= $validator->error('rid'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">NAME</label>
                    <div class="col-sm-9">
                    <input type="text" name="offuser" class="form-control" value="<?= isset($_POST['offuser']) ? htmlspecialchars($_POST['offuser']) : ''; ?>" oninput="clearSuccessMessage()">
                        <?= $validator->error('offuser'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">PASSWORD</label>
                    <div class="col-sm-9">
                    <input type="text" name="offpass" class="form-control" value="<?= isset($_POST['offpass']) ? htmlspecialchars($_POST['offpass']) : ''; ?>" oninput="clearSuccessMessage()">
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
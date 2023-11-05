<?php 

 require('../config/autoload.php'); ?>
 <?php
 include("dbcon.php");
 include("header.php");
 $owno=$_SESSION["id"];
$file=new FileUpload();
$elements=array(
        "loc"=>"","date"=>"","vid"=>"", "pic" => "");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('loc'=>"loc",'date'=>"date",'vid'=>"vehiclename", "pic" => "pic");

$rules=array(
    "loc"=>array("required"=>true,"alphaspaceonly"=>true),
    "date"=>array("required"=>true),
    "vid"=>array("required"=>true),
    "pic" => array("filerequired" => true)
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

 $sql = "select vid from owner where owno=".$owno;
 $conn->query($sql);

if(isset($_POST["reset"]))
{
    if ($fileName = $file->doUploadRandom($_FILES['pic'], array('.jpg', '.png', '.jpeg'), 100000, 1, '../uploads')) {
if($validator->validate($_POST))
{
	


$data=array(

        'loc'=>$_POST['loc'],
        'owno'=>$owno,
        'date'=>$_POST['date'],
        'vid'=>$_POST['vid'],
        'pic' => $fileName,
        'status' => 1
         
    );

   
  
    if($dao->insert($data,"missing"))
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
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="addmiss.php">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">VEHICLE</label>
                    <div class="col-sm-9">
                    <?php
$sql = "SELECT v.vrno FROM vehicle v JOIN owner o ON v.vid = o.vid WHERE o.owno = $owno";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Initialize an empty options array
    $options = array();

    // Fetch the data from the database and create options for the dropdown
    while ($row = $result->fetch_assoc()) {
        $value = $row['vrno'];
        $options[] = "<option value='$value'>$value</option>";
    }

    // Display the dropdown list
    echo "<select name='vrno' class='form-control'>" . implode('', $options) . "</select>";
} else {
    // Display an error message or alternative content if the query didn't return results
    echo 'No data found for owno ' . $owno;
}

// Close the database connection
$conn->close();
?>





<?= $validator->error('vid'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">loc</label>
                    <div class="col-sm-9">
                    <?= $form->textBox('loc',array('class'=>'form-control')); ?>
<?= $validator->error('loc'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">date</label>
                    <div class="col-sm-9">
                    <input type="date" name="date">
                    </div>
                </div>
                <div class="form-group row">
                        <label for="pic" class="col-sm-3 col-form-label">PHOTO</label>
                        <div class="col-sm-9">
                            <?= $form->fileField('pic', array('class' => 'form-control')); ?>
                            <span style="color:red;"><?= $validator->error('pic'); ?></span>
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
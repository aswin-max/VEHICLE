
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
        $successMessage = 'New record created successfully';
        $_POST['OFFENCE'] = '';
        $_POST['AMOUNT'] = '';
        $_POST['tid'] = '';
    }
    else
        $msg="Registration failed"; ?>



<?php
    
}
else
echo $file->errors();
}                                                                                                                                                                                                                                                                                                                            
?>

<html>
<head>
<script>
    // JavaScript function to clear the dropdown selection
    function clearDropdownSelection() {
        document.getElementById('myDropdown').value = ''; // Clear the selected value
    }

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
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="addoffence.php">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">VEHICLE TYPE</label>
                    <div class="col-sm-9">
                    <?php
$options = $dao->createOptions('tname', 'tid', 'type');
echo $form->dropDownList('tid', array('class' => 'form-control', 'id' => 'myDropdown'), $options);
?>
<?= $validator->error('tid'); ?>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">OFFENCE</label>
                    <div class="col-sm-9">
                    <input type="text" name="OFFENCE" class="form-control" value="<?= isset($_POST['OFFENCE']) ? htmlspecialchars($_POST['OFFENCE']) : ''; ?>" oninput="clearSuccessMessage()">
<?= $validator->error('OFFENCE'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">AMOUNT</label>
                    <div class="col-sm-9">
                    <input type="text" name="AMOUNT" class="form-control" value="<?= isset($_POST['AMOUNT']) ? htmlspecialchars($_POST['AMOUNT']) : ''; ?>" oninput="clearSuccessMessage()">
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
<?php include("footer.php"); ?>
<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "vrno"=>"","tid"=>"","vname"=>"","rid"=>"","vehiclename"=>"","fid"=>"","color"=>"","dor"=>"","rc"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('vrno'=>"vrno",'tid'=>"tname",'vname'=>"vname",'rid'=>"rname",'vehiclename'=>"vehiclename",'fid'=>"fname",'color'=>"color",'dor'=>"dor",'rc'=>"rc book");

$rules=array(
    "tid"=>array("required"=>true),
    "vrno"=>array("required"=>true),
    "vname"=>array("required"=>true,"alphaspaceonly"=>true),
    "rid"=>array("required"=>true),
    "fid"=>array("required"=>true),
    "vehiclename"=>array("required"=>true),
    "color"=>array("required"=>true,"alphaonly"=>true),
    "dor"=>array("required"=>true),
    "rc"=>array("filerequired"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{
    print_r($_POST);
if($validator->validate($_POST))
{
     echo"hi";
	if($fileName=$file->doUploadRandom($_FILES['rc'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {
    

$data=array(

        'tid'=>$_POST['tid'],
        'vrno'=>$_POST['vrno'],
        'vname'=>$_POST['vname'],
        'rid'=>$_POST['rid'],
        'fid'=>$_POST['fid'],
        'vehiclename'=>$_POST['vehiclename'],
        'color'=>$_POST['color'],
        'dor'=>$_POST['dor'],
        'rc'=>$fileName
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
<div class="row">
                    <div class="col-md-6">
RC BOOK:

<?= $form->fileField('rc',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('rc'); ?></span>

</div>
</div>


<input type="submit" name="insert" value="submit">
</form>



 <?php 
$drop= $dao->getDataJoin(array('rid','rname'),'rto');

 $dropss=array();
 foreach( $drop as $key=>$value)
 {
   $drops= array("rid" =>$key, "rname" => $value);
   array_push($dropss,$drops);

 }

 $optionsArray = [];

 foreach ($dropss as $key=>$item) {
    $reg=$item['rname'];
    $optionsArray[] = [
    "option" => $reg,
          "value" => $item["rid"]
      ];
    
 }

 
 // Convert the PHP array to a JSON string for JavaScript
 $optionsArrayJson = json_encode($optionsArray);
  ?>
<div class="custom-dropdown">
  <input type="text" id="customInput" placeholder="Type or select an RTO">
  <ul id="customDropdown">
     </ul>
</div>
  
    
 

<style>
.custom-dropdown {
  position: relative;
  width: 200px;
}

#customInput {
  width: 100%;
}

#customDropdown {
  display: none;
  position: absolute;
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #fff;
  border: 1px solid #ccc;
}

#customDropdown li {
  padding: 5px;
  cursor: pointer;
}

#customDropdown li:hover {
  background-color: #e0e0e0;
}
</style>
<script>
  const customInput = document.getElementById('customInput');
const customDropdown = document.getElementById('customDropdown');

// Define your array of objects with options and values
const optionsArrayyy = <?php echo $optionsArrayJson;?>;
const newData = [];

// Loop through the original data and transform it
optionsArrayyy.forEach(item => {
    newData.push({
        "option": item.option.rname,
        "value": item.value
    });
});
optionsArray=newData;
// Function to populate the custom dropdown with options from the array
function populateDropdown() {
  customDropdown.innerHTML = '';
  optionsArray.forEach(function (item) {
    const listItem = document.createElement('li');
    listItem.textContent = item.option;
    listItem.setAttribute('data-value', item.value);
    customDropdown.appendChild(listItem);

    listItem.addEventListener('click', function () {
      customInput.value = item.option;
      customDropdown.style.display = 'none';
    });
  });
}

customInput.addEventListener('focus', function () {
  customDropdown.style.display = 'block';
  populateDropdown();
});

customInput.addEventListener('input', function () {
  customDropdown.style.display = 'block';
  const inputText = customInput.value.trim().toLowerCase();

  populateDropdown(); // Populate the dropdown with all options

  const filteredItems = customDropdown.querySelectorAll('li');

  filteredItems.forEach(function (item) {
    if (!item.textContent.toLowerCase().includes(inputText)) {
      item.style.display = 'none';
    } else {
      item.style.display = 'block';
    }
  });
});

</script>

</body>

</html>









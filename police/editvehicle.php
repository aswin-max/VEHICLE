<?php 

 require('../config/autoload.php'); 
include("header.php");$dao=new DataAccess();
$info=$dao->getData('*','vehicle','vid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "vrno"=>$info[0]['vrno'],"tid"=>$info[0]['tid'],"rid"=>$info[0]['rid'],"vehiclename"=>$info[0]['vehiclename'],"fid"=>$info[0]['fid'],"color"=>$info[0]['color'],"dor"=>$info[0]['dor'],"rc"=>"");

$form=new FormAssist($elements,$_POST);





$labels=array('vrno'=>"vrno",'tid'=>"tname",'rid'=>"rname",'vehiclename'=>"vehiclename",'fid'=>"fname",'color'=>"color",'dor'=>"dor",'rc'=>"rc book");

$rules=array(
    "tid"=>array("required"=>true),
    "vrno"=>array("required"=>true),
    
    "rid"=>array("required"=>true),
    "fid"=>array("required"=>true),
    "vehiclename"=>array("required"=>true),
    "color"=>array("required"=>true,"alphaonly"=>true),
    "dor"=>array("required"=>true),
    "rc"=>array("filerequired"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
    print_r($_POST);
if(isset($_FILES['simage']['name']))
{
    if(isset($_FILES['simage']['name'])){
   
	if($fileName=$file->doUploadRandom($_FILES['rc'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {
      
        $flag=true;
      
        $rto=$_POST['rid'];
      
        $parts = explode(".", $rto);
    }}
$data=array(

        'tid'=>$_POST['tid'],
        'vrno'=>$_POST['vrno'],
        
        'rid'=>$parts[0],
        'fid'=>$_POST['fid'],
        'vehiclename'=>$_POST['vehiclename'],
        'color'=>$_POST['color'],
        'dor'=>$_POST['dor'],
        //'rc'=>$fileName
    );
    $condition='sid='.$_GET['id'];
if(isset($flag))
			{	$data['simage']=$fileName;
		
			}

    print_r($data);
  
    if($dao->update($data,'student',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>
<?php



    
}
}

else
echo $file->errors();
                                                                                                                                                                                                                                                                                                                           
?>
<html>
<head>
</head>
<body>

 <form  method="POST" enctype="multipart/form-data" action="addvehicle.php"  >

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
VEHICLE RC NUMBER:

<?= $form->textBox('vrno',array('class'=>'form-control')); ?>
<?= $validator->error('vrno'); ?>

</div>
</div>



RTO
<?php

$drop= $dao->getDataJoin(array('rid','regid','rname'),'rto');

 $dropss=array();
 foreach( $drop as $key=>$value)
 {
   $drops= array("rid" =>$value['rid'],"regid" =>$value['regid'], "rname" => $value['rname']);
   array_push($dropss,$drops);

 }

 $optionsArray = [];

 foreach ($dropss as $key=>$item) {
    
    $optionsArray[] = [
        "option" => $item['rid'].'.'.$item['regid'].' ' . $item['rname'],
        "value" => $item['rid'].'.'.$item['regid'].' ' . $item['rname']
      ];
    
 }

 
 // Convert the PHP array to a JSON string for JavaScript
 $optionsArrayJson = json_encode($optionsArray);


  ?>


<style>
.custom-dropdown {
  position: relative;
  width: 500px;
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
  z-index: 1;
  max-height: 150px; /* Set a maximum height for the dropdown */
  overflow-y: auto; /* Enable vertical scrolling if the list exceeds the maximum height */
}

#customDropdown li {
  width: 470px;
  padding: 5px;
  cursor: pointer;
}

#customDropdown li:hover {
  background-color: #e0e0e0;
}

.input-container {
  width: 500px;
  display: inline-flex;
  align-items: center;
}

#customInput {
  margin-right: 10px;
}

.clear-button {
  cursor: pointer;
  color: #999;
}

.clear-button:hover {
  color: #333;
}
</style>
<div class="custom-dropdown">
  <label class="col-form-label"></label><br>
  <div class="input-container">
    <input type="text" name="rid" id="customInput" placeholder="RTO" class="form-control d-inline">
    <span class="clear-button d-inline mdi mdi-close"></span>
  </div>
  <ul id="customDropdown"></ul>
</div>

            <script>
  const customInput = document.getElementById('customInput');
const customDropdown = document.getElementById('customDropdown');

// Define your array of objects with options and values
const optionsArrayyy = <?php echo $optionsArrayJson;?>;
const newData = [];

// Loop through the original data and transform it
optionsArrayyy.forEach(item => {
    newData.push({
        "option": item.option,
        "value": item.value
    });
});
optionsArray=newData;
// Function to populate the custom dropdown with options from the array
function populateDropdown() {
  customDropdown.innerHTML = '';
  optionsArrayyy.forEach(function (item) {
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


</div>
</div>


<button type="submit" name="btn_update"  >UPDATE</button>
</form>



</body>

</html>











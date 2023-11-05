<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "vid"=>"","fine_id"=>"","rid"=>"","loc"=>"","date"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('vid'=>"vid",'fine_id'=>"fine_id","rid"=>"rtoname",'loc'=>"location","date"=>"date");

$rules=array(
    "vid"=>array("required"=>true,"alphaspaceonly"=>true),
    "fine_id"=>array("required"=>true),
    "rid"=>array("required"=>true),
    "loc"=>array("required"=>true),
    "date"=>array("required"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

        'vid'=>$_POST['vid'],

        'fine_id'=>$_POST['fine_id'],
        
        'rid'=>$_POST['rid'],
        
        'loc'=>$_POST['loc'],
        
        'date'=>$_POST['date']
         
    );

    print_r($data);
  
    if($dao->insert($data,"epunish"))
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

 <form  method="POST" enctype="multipart/form-data">

 <div class="row">
                    <div class="col-md-6">
DATE:

<input type="date" name="dor">
</div>
</div>

<div class="row">
                    <div class="col-md-6">
LOCATION:

<?= $form->textBox('loc',array('class'=>'form-control')); ?>
<?= $validator->error('loc'); ?>

</div>
</div>
 <?php

$drop= $dao->getDataJoin(array('vid','vrno'),'vehicle');

 $dropss=array();
 foreach( $drop as $key=>$value)
 {
   $drops= array("vid" =>$value['vid'],"vrno" =>$value['vrno']);
   array_push($dropss,$drops);

 }

 $optionsArray = [];

 foreach ($dropss as $key=>$item) {
    
    $optionsArray[] = [
        "option" => $item['vid'].'.'.$item['vrno'],
        "value" => $item['vid'].'.'.$item['vrno']
      ];
    
 }

 
 // Convert the PHP array to a JSON string for JavaScript
 $optionsArrayJson1 = json_encode($optionsArray);


  ?>

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
 $optionsArrayJson2 = json_encode($optionsArray);


  ?>

<?php

$drop= $dao->getDataJoin(array('fine_id','offence'),'fine');

 $dropss=array();
 foreach( $drop as $key=>$value)
 {
   $drops= array("fine_id" =>$value['fine_id'], "offence" => $value['offence']);
   array_push($dropss,$drops);

 }

 $optionsArray = [];

 foreach ($dropss as $key=>$item) {
    
    $optionsArray[] = [
        "option" => $item['fine_id'].' ' . $item['offence'],
        "value" => $item['fine_id'].' ' . $item['offence']
      ];
    
 }

 
 // Convert the PHP array to a JSON string for JavaScript
 $optionsArrayJson3 = json_encode($optionsArray);


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
  z-index: 1; /* Set the z-index property */
}

#customDropdown li {
    width:470px;
  padding: 5px;
  cursor: pointer;
}

#customDropdown li:hover {
  background-color: #e0e0e0;
}
.input-container {
    width:500px;
  display: inline-flex; /* Display children inline */
  align-items: center; /* Align items vertically center */
}

#customInput {
  margin-right: 10px; /* Add spacing between input and clear button */
}

.clear-button {
  cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
  color: #999; /* Define the color of the clear button */
}

.clear-button:hover {
  color: #333; /* Define a different color when hovering over the clear button */
}
</style>
<div class="custom-dropdown">
  <label class="col-form-label"><b>Search Patient Record</b></label><br>
  <div class="input-container">
    <input type="text" name="vid" id="customInput1" placeholder="Type rid, Name, Phone" class="form-control d-inline">
    <span class="clear-button d-inline mdi mdi-close"></span>
  </div>
  <ul id="customDropdown1"></ul>
</div>

<!-- ----------------------------- -->

<div class="custom-dropdown">
  <label class="col-form-label"><b>Search Patient Record</b></label><br>
  <div class="input-container">
    <input type="text" name="rid" id="customInput2" placeholder="Type rid, Name, Phone" class="form-control d-inline">
    <span class="clear-button d-inline mdi mdi-close"></span>
  </div>
  <ul id="customDropdown2"></ul>
</div>

<!-- ----------------------------- -->

<div class="custom-dropdown">
  <label class="col-form-label"><b>Search Patient Record</b></label><br>
  <div class="input-container">
    <input type="text" name="fine_id" id="customInput3" placeholder="Type rid, Name, Phone" class="form-control d-inline">
    <span class="clear-button d-inline mdi mdi-close"></span>
  </div>
  <ul id="customDropdown3"></ul>
</div>

<!-- ----------------------------- -->



            <script>
  const customInput1 = document.getElementById('customInput1');
const customDropdown1 = document.getElementById('customDropdown1');

// Define your array of objects with options and values
const optionsArrayyy1 = <?php echo $optionsArrayJson1;?>;

const newData1 = [];

// Loop through the original data and transform it
optionsArrayyy1.forEach(item => {
    newData1.push({
        "option": item.option,
        "value": item.value
    });
});
optionsArray1=newData1;




// Function to populate the custom dropdown with options from the array
function populateDropdown1() {
  customDropdown1.innerHTML = '';
  optionsArray1.forEach(function (item) {
    const listItem1 = document.createElement('li');
    listItem1.textContent = item.option;
    listItem1.setAttribute('data-value', item.value);
  
    customDropdown1.appendChild(listItem1);

    listItem1.addEventListener('click', function () {
      customInput1.value = item.option;
      customDropdown1.style.display = 'none';
    });
  });
}

customInput1.addEventListener('focus', function () {
  customDropdown1.style.display = 'none';
  populateDropdown1();
});

customInput1.addEventListener('input', function () {
  customDropdown1.style.display = 'block';
  const inputText = customInput1.value.trim().toLowerCase();

  populateDropdown1(); // Populate the dropdown with all options

  const filteredItems = customDropdown1.querySelectorAll('li');

  filteredItems.forEach(function (item) {
    if (!item.textContent.toLowerCase().includes(inputText)) {
      item.style.display = 'none';
    } else {
      item.style.display = 'block';
    }
  });
});

// ----------------------------------------------------------


const customInput2 = document.getElementById('customInput2');
const customDropdown2 = document.getElementById('customDropdown2');
const optionsArrayyy2 = <?php echo $optionsArrayJson2;?>;
const newData2 = [];

optionsArrayyy2.forEach(item => {
    newData2.push({
        "option": item.option,
        "value": item.value
    });
});
optionsArray2=newData2;

function populateDropdown2() {
  customDropdown2.innerHTML = '';
  optionsArray2.forEach(function (item) {
    const listItem2 = document.createElement('li');
    listItem2.textContent = item.option;
    listItem2.setAttribute('data-value', item.value);
  
    customDropdown2.appendChild(listItem2);

    listItem2.addEventListener('click', function () {
      customInput2.value = item.option;
      customDropdown2.style.display = 'none';
    });
  });
}

customInput2.addEventListener('focus', function () {
  customDropdown2.style.display = 'none';
  populateDropdown2();
});

customInput2.addEventListener('input', function () {
  customDropdown2.style.display = 'block';
  const inputText = customInput2.value.trim().toLowerCase();

  populateDropdown2(); // Populate the dropdown with all options

  const filteredItems = customDropdown2.querySelectorAll('li');

  filteredItems.forEach(function (item) {
    if (!item.textContent.toLowerCase().includes(inputText)) {
      item.style.display = 'none';
    } else {
      item.style.display = 'block';
    }
  });
});



// ----------------------------------------------------------


const customInput3 = document.getElementById('customInput3');
const customDropdown3 = document.getElementById('customDropdown3');
const optionsArrayyy3 = <?php echo $optionsArrayJson3;?>;
const newData3 = [];

optionsArrayyy3.forEach(item => {
    newData3.push({
        "option": item.option,
        "value": item.value
    });
});
optionsArray3=newData3;

function populateDropdown3() {
  customDropdown3.innerHTML = '';
  optionsArray3.forEach(function (item) {
    const listItem3 = document.createElement('li');
    listItem3.textContent = item.option;
    listItem3.setAttribute('data-value', item.value);
  
    customDropdown3.appendChild(listItem3);

    listItem3.addEventListener('click', function () {
      customInput3.value = item.option;
      customDropdown3.style.display = 'none';
    });
  });
}

customInput3.addEventListener('focus', function () {
  customDropdown3.style.display = 'none';
  populateDropdown3();
});

customInput3.addEventListener('input', function () {
  customDropdown3.style.display = 'block';
  const inputText = customInput3.value.trim().toLowerCase();

  populateDropdown3(); // Populate the dropdown with all options

  const filteredItems = customDropdown3.querySelectorAll('li');

  filteredItems.forEach(function (item) {
    if (!item.textContent.toLowerCase().includes(inputText)) {
      item.style.display = 'none';
    } else {
      item.style.display = 'block';
    }
  });
});


</script>







<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>
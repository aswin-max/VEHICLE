<?php 

 require('../config/autoload.php'); 
include("header.php");
$file=new FileUpload();
$elements=array(
        "vid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('vid'=>"ownerno");

$rules=array(
    "vid"=>array("required"=>true)
   
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{
    print_r($_POST);
if($validator->validate($_POST))
{
     

$data=array(

        'vid'=>$_POST['vid'],
       
    );

    print_r($data);
  
    if($dao->update($data,"owner","owno=".$_SESSION['id']))
    {
         

        echo "<script> alert('New record created successfully');</script> ";
        echo"<script> location.replace('home.php'); </script>";
    }
    else
        {$msg="Registration failed";} 




    
}
}

else
echo $file->errors();
                                                                                                                                                                                                                                                                                                                           
?>
<html>
<head>
</head>
<body>

 <form  method="POST" enctype="multipart/form-data">

>


owner
<?php
        $drop = $dao->getDataJoin(array('vid', 'vrno'), 'vehicle');
        $dropss = [];
        foreach ($drop as $key => $value) {
            $drops = array("vid" => $value['vid'], "vrno" => $value['vrno']);
            array_push($dropss, $drops);
        }
        $optionsArray = [];
        foreach ($dropss as $key => $item) {
            $optionsArray[] = [
                "option" => $item['vid'] . '.' . $item['vrno'],
                "value" => $item['vid'] . '.' . $item['vrno']
            ];
        }
        $optionsArrayJson = json_encode($optionsArray);
        ?>
        <div class="custom-dropdown">
            <label class="col-form-label"><b>owner</b></label><br>
            <div class="input-container">
                <input type="text" name="vid" id="customInput" placeholder="Type vid or owner Number" class="form-control d-inline">
                <span class="clear-button d-inline mdi mdi-close"></span>
            </div>
            <ul id="customDropdown"></ul>
        </div>


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






<input type="submit" name="insert" value="Submit">
</form>



</body>

</html>











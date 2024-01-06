<?php include("sidebar.php");?>

<?php
$dao = new DataAccess();
$file = new FileUpload();
$elements = array(
    "vrno" => "", "tid" => "", "rid" => "", "vehiclename" => "", "fid" => "", "color" => "", "dor" => "", "rc" => ""
);

$form = new FormAssist($elements, $_POST);



$labels = array('vrno' => "vrno", 'tid' => "tname", 'rid' => "rname", 'vehiclename' => "vehiclename", 'fid' => "fname", 'color' => "color", 'dor' => "dor", 'rc' => "rc book");

$rules = array(
    "tid" => array("required" => true),
    "vrno" => array("required" => true),
    "rid" => array("required" => true),
    "fid" => array("required" => true),
    "vehiclename" => array("required" => true),
    "color" => array("required" => true, "alphaonly" => true),
    "dor" => array("required" => true),
    "rc" => array("filerequired" => true)
);

$validator = new FormValidator($rules, $labels);

if (isset($_POST["reset"])) {
    if ($validator->validate($_POST)) {
        if ($fileName = $file->doUploadRandom($_FILES['rc'], array('.jpg', '.png', '.jpeg'), 100000, 1, '../uploads')) {
            $rto = $_POST['rid'];
            $parts = explode(".", $rto);

            $data = array(
                'tid' => $_POST['tid'],
                'vrno' => $_POST['vrno'],
                'rid' => $parts[0],
                'fid' => $_POST['fid'],
                'vehiclename' => $_POST['vehiclename'],
                'color' => $_POST['color'],
                'dor' => $_POST['dor'],
                'rc' => $fileName
            );

            if ($dao->insert($data, "vehicle")) {
                echo "<script> alert('New record created successfully');</script> ";
            } else {
                $msg = "Registration failed";
            }
        }
    }
} else {
    echo $file->errors();
}
?>

<html>

<head>
</head>

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
<body>
  
  

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-description"></p>
                <form class="forms-sample" method="POST" enctype="multipart/form-data" action="addvehicle.php">

                    <div class="form-group row">
                        <label for="tid" class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <?php
                            $options = $dao->createOptions('tname', 'tid', "type");
                            echo $form->dropDownList('tid', array('class' => 'form-control'), $options);
                            echo $validator->error('tid');
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vrno" class="col-sm-3 col-form-label">Vehicle RC Number</label>
                        <div class="col-sm-9">
                            <?= $form->textBox('vrno', array('class' => 'form-control')); ?>
                            <?= $validator->error('vrno'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rid" class="col-sm-3 col-form-label">RTO</label>
                        <div class="col-sm-9">
                        <div class="custom-dropdown">
                               <label class="col-form-label"></label><br>
                              <div class="input-container">
                                <input type="text" name="rid" id="customInput" placeholder="RTO" class="form-control d-inline">
                                 <span class="clear-button d-inline mdi mdi-close"></span>
                                        </div>
                                         <ul id="customDropdown"></ul>
                                </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vehiclename" class="col-sm-3 col-form-label">Vehicle Name</label>
                        <div class="col-sm-9">
                            <?= $form->textBox('vehiclename', array('class' => 'form-control')); ?>
                            <?= $validator->error('vehiclename'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fid" class="col-sm-3 col-form-label">Fuel</label>
                        <div class="col-sm-9">
                            <?php
                            $options = $dao->createOptions('fname', 'fid', "fuel");
                            echo $form->dropDownList('fid', array('class' => 'form-control'), $options);
                            echo $validator->error('fid');
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="color" class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                            <?= $form->textBox('color', array('class' => 'form-control')); ?>
                            <?= $validator->error('color'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dor" class="col-sm-3 col-form-label">Date</label>
                        
                    <div class="col-sm-9">
    <input type="date" name="date" id="datePicker">
</div>
<script>
    // Get the current date
    var today = new Date();
    // Calculate tomorrow's date
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    // Set the max attribute to tomorrow's date
    document.getElementById('datePicker').max = tomorrow.toISOString().split('T')[0];
</script>

                    <div class="form-group row">
                        <label for="rc" class="col-sm-3 col-form-label">RC Book</label>
                        <div class="col-sm-9">
                            <?= $form->fileField('rc', array('class' => 'form-control')); ?>
                            <span style="color:red;"><?= $validator->error('rc'); ?></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="reset">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
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


</body>

</html>

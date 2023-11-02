<?php
require('../config/autoload.php');
include("sidebar.php");
$dao = new DataAccess();
$file = new FileUpload();
$elements = array("vid" => "", "fine_id" => "", "offid" => "", "loc" => "", "date" => "", "pic" => "");
$form = new FormAssist($elements, $_POST);
$labels = array('vid' => "vid", 'fine_id' => "fine_id", 'offid' => "officer", 'loc' => "location", "date" => "date", "pic" => "pic");
$offid=$_SESSION['id'];
print_r($_SESSION);
$rules = array(
    "vid" => array("required" => true),
    "fine_id" => array("required" => true),
    "loc" => array("required" => true, "alphaspaceonly" => true),
    "date" => array("required" => true),
    "pic" => array("filerequired" => true)
);

$validator = new FormValidator($rules, $labels);
if (isset($_POST["reset"])) {
    if ($validator->validate($_POST)) {
        if ($fileName = $file->doUploadRandom($_FILES['pic'], array('.jpg', '.png', '.jpeg'), 100000, 1, '../uploads')) {
            $rto = $_POST['fine_id'];
            $parts = explode(".", $rto);
                    $rto1 = $_POST['vid'];
                    $parts = explode(".", $rto1);
                    $data = array(
                        'vid' => $parts[0],
                        'fine_id' => $_POST['fine_id'],
                        'offid' =>$offid,
                        'loc' => $_POST['loc'],
                        'date' => $_POST['date'],
                        'pic' => $fileName,
                        'status' => 1
                    );

                    $dao = new DataAccess();
                    if ($dao->insert($data, "punish")) {
                        echo "<script> alert('New record created successfully');</script>";
                    } else {
                        $msg = "Registration failed";
                    }
                }
            }
        }
    
 else {
    echo $file->errors();
}
?>

<html>
<head>
</head>
<?php
$drop = $dao->getDataJoin(array('vid', 'vrno'), 'vehicle');
$dropss = [];
foreach ($drop as $key => $value) {
    $drops = array("vid" => $value['vid'], "vrno" => $value['vrno']);
    array_push($dropss, $drops);
}
$optionsArray1 = [];
foreach ($dropss as $key => $item) {
    $optionsArray1[] = [
        "option" => $item['vid'] . '.' . $item['vrno'],
        "value" => $item['vid'] . '.' . $item['vrno']
    ];
}
$optionsArrayJson1 = json_encode($optionsArray1);
?>

<?php
$drop = $dao->getDataJoin(array('fine_id', 'offence'), 'fine');
$dropss = [];
foreach ($drop as $key => $value) {
    $drops = array("fine_id" => $value['fine_id'], "offence" => $value['offence']);
    array_push($dropss, $drops);
}
$optionsArray3 = [];
foreach ($dropss as $key => $item) {
    $optionsArray3[] = [
        "option" => $item['fine_id'] . ' ' . $item['offence'],
        "value" => $item['fine_id'] . ' ' . $item['offence']
    ];
}
$optionsArrayJson3 = json_encode($optionsArray3);
?>

<body>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-description"></p>
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="punish.php">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label">DATE</label>
                    <div class="col-sm-9">
                        <input type="date" name="date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">LOCATION</label>
                    <div class="col-sm-9">
                        <?= $form->textBox('loc', array('class' => 'form-control')); ?>
                        <?= $validator->error('loc'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vid" class="col-sm-3 col-form-label">RC NUMBER</label>
                    <div class="col-sm-9">
                        <div class="custom-dropdown">
                            <label class="col-form-label"></label><br>
                            <div class="input-container">
                                <input type="text" name="vid" id="customInput1" placeholder="Type vid or Vehicle Number" class="form-control d-inline">
                                <span class="clear-button d-inline mdi mdi-close"></span>
                            </div>
                            <ul id="customDropdown1"></ul>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fine_id" class="col-sm-3 col-form-label">OFFENCE</label>
                    <div class="col-sm-9">
                        <div class="custom-dropdown">
                            <label class="col-form-label"></label><br>
                            <div class="input-container">
                                <input type="text" name="fine_id" id="customInput3" placeholder="Type fine_id or Offence" class="form-control d-inline">
                                <span class="clear-button d-inline mdi mdi-close"></span>
                            </div>
                            <ul id="customDropdown3"></ul>
                        </div>
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

<script>
    const customInput1 = document.getElementById('customInput1');
    const customDropdown1 = document.getElementById('customDropdown1');
    const optionsArray1 = <?php echo $optionsArrayJson1; ?>;
    const newData1 = [];

    optionsArray1.forEach(item => {
        newData1.push({
            "option": item.option,
            "value": item.value
        });
    });

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
        customDropdown1.style.display = 'block';
        populateDropdown1();
    });

    customInput1.addEventListener('input', function () {
        customDropdown1.style.display = 'block';
        const inputText = customInput1.value.trim().toLowerCase();

        populateDropdown1();

        const filteredItems = customDropdown1.querySelectorAll('li');

        filteredItems.forEach(function (item) {
            if (!item.textContent.toLowerCase().includes(inputText)) {
                item.style.display = 'none';
            } else {
                item.style.display = 'block';
            }
        });
    });
</script>


<script>
    const customInput3 = document.getElementById('customInput3');
    const customDropdown3 = document.getElementById('customDropdown3');
    const optionsArray3 = <?php echo $optionsArrayJson3; ?>;
    const newData3 = [];

    optionsArray3.forEach(item => {
        newData3.push({
            "option": item.option,
            "value": item.value
        });
    });

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
        customDropdown3.style.display = 'block';
        populateDropdown3();
    });

    customInput3.addEventListener('input', function () {
        customDropdown3.style.display = 'block';
        const inputText = customInput3.value.trim().toLowerCase();

        populateDropdown3();

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
</body>
</html>

<?php


include("sidebar.php");
$dao = new DataAccess();
$info=$dao->getData('*','punish','pid='.$_GET['id']);
$file = new FileUpload();
$elements = array("pid" =>$info[0]['pid'], "fine_id" =>$info[0]['fine_id'],"offname" =>$info[0]['offname'], "loc" =>$info[0]['loc'], "date" =>$info[0]['date']);

$form = new FormAssist($elements, $_POST);


$labels = array('vid' => "vid", 'fine_id' => "fine_id",'offname' => "officer", 'loc' => "location", "date" => "date");

$rules = array(
    "vid" => array("required" => true),
    "fine_id" => array("required" => true),
    
    "offname" => array("required" => true, "alphaspaceonly" => true),
    "loc" => array("required" => true, "alphaspaceonly" => true),
    "date" => array("required" => true),
    
);

$validator = new FormValidator($rules, $labels);

if (isset($_POST["insert"])) 
{
    if ($validator->validate($_POST)) 
    {
        
           $rto=$_POST['vid'];
        $parts = explode(".", $rto);
        $data = array(
            'vid' => $parts[0],
            'fine_id' => $_POST['fine_id'],
            
            'offname' => $_POST['offname'],
            'loc' => $_POST['loc'],
            'date' => $_POST['date'],
            
            
        );

        if ($dao->insert($data, "punish")) 
        {
            echo "<script> alert('New record created successfully');</script>";
        } 
        else 
        {
            $msg = "Registration failed";
        }
    } 
    
}

else 
    {
        echo $file->errors();
    }
?>

<html>
<head>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                DATE:
                <input type="date" name="date">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                LOCATION:
                <?= $form->textBox('loc', array('class' => 'form-control')); ?>
                <?= $validator->error('loc'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                OFFICER NAME:
                <?= $form->textBox('offname', array('class' => 'form-control')); ?>
                <?= $validator->error('offname'); ?>
            </div>
        </div>

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
        <div class="custom-dropdown">
            <label class="col-form-label"><b>Vehicle</b></label><br>
            <div class="input-container">
                <input type="text" name="vid" id="customInput1" placeholder="Type vid or Vehicle Number" class="form-control d-inline">
                <span class="clear-button d-inline mdi mdi-close"></span>
            </div>
            <ul id="customDropdown1"></ul>
        </div>

        

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

        <div class="custom-dropdown">
            <label class="col-form-label"><b> Fine</b></label><br>
            <div class="input-container">
                <input type="text" name="fine_id" id="customInput3" placeholder="Type fine_id or Offence" class="form-control d-inline">
                <span class="clear-button d-inline mdi mdi-close"></span>
            </div>
            <ul id="customDropdown3"></ul>
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




<button type="submit" name="insert">Submit</button>
</form>
</body>

<!-- Add similar scripts for customInput2 and customInput3 -->

</html>

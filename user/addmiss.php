<?php 
require('../config/autoload.php');
?>
<?php
include("dbcon.php");
include("header.php");
$owno = $_SESSION["id"];
$file = new FileUpload();
$elements = array("loc" => "", "date" => "", "vid" => "", "pic" => "");

$form = new FormAssist($elements, $_POST);

$dao = new DataAccess();

$labels = array('vid' => "vehiclenumber", 'loc' => "loc", 'date' => "date", "pic" => "pic");

$rules = array(
    "vid" => array("required" => true),
    "loc" => array("required" => true, "alphaspaceonly" => true),
    "date" => array("required" => true),
    "pic" => array("filerequired" => true)
);

$validator = new FormValidator($rules, $labels);

if (isset($_POST["reset"])) {
    if ($fileName = $file->doUploadRandom($_FILES['pic'], array('.jpg', '.png', '.jpeg'), 100000, 1, '../uploads')) {
        if ($validator->validate($_POST)) {
            $vid = $_POST['vid']; // Capture 'vid' from the form

            $data = array(
                'vid' => $vid, // Use the captured 'vid' value
                'loc' => $_POST['loc'],
                'owno' => $owno,
                'date' => $_POST['date'],
                'pic' => $fileName,
                'status' => 1
            );

            if ($dao->insert($data, "missing")) {
                echo "<script> alert('New record created successfully');</script> ";
            } else {
                $msg = "Registration failed";
            }
        }
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
                        $sql = "SELECT v.vrno, v.vid FROM vehicle v JOIN owner o ON v.vid = o.vid WHERE o.owno = $owno";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            $options = array();

                            while ($row = $result->fetch_assoc()) {
                                $vrno = $row['vrno'];
                                $vid = $row['vid'];
                                $options[] = "<option value='$vid'>$vrno</option>"; // Use 'vid' as the option value
                            }

                            echo "<select name='vid' class='form-control'>" . implode('', $options) . "</select>";
                        } else {
                            echo 'No data found for owno ' . $owno;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loc" class="col-sm-3 col-form-label">loc</label>
                    <div class="col-sm-9">
                        <?= $form->textBox('loc', array('class' => 'form-control')); ?>
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

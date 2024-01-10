<?php
include("sidebar.php");
$file = new FileUpload();
$dao = new DataAccess();

$rules = array(
    "rname" => array("required" => true, "alphaonly" => true),
    "regid" => array("required" => true)
);

$validator = new FormValidator($rules);
$successMessage = ""; // Initialize the variable to hold the success message

if (isset($_POST["insert"])) {
    if ($validator->validate($_POST)) {
        $data = array(
            'regid' => $_POST['regid'],
            'rname' => $_POST['rname']
        );

        if ($dao->insert($data, "rto")) {
            $successMessage = 'New record created successfully';
            $_POST['rname'] = ''; // Clear the 'rname' text box value in $_POST
            $_POST['regid'] = ''; // Clear the 'regid' text box value in $_POST
        } else {
            $msg = "Registration failed";
        }
    } else {
        echo $file->errors();
    }
}
?>

<html>
<head>
    <script>
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

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            RTO:
            <input type="text" name="rname" class="form-control" value="<?= isset($_POST['rname']) ? htmlspecialchars($_POST['rname']) : ''; ?>" oninput="clearSuccessMessage()">
            <?= $validator->error('rname'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            REGISTRATION_ID:
            <input type="text" name="regid" class="form-control" value="<?= isset($_POST['regid']) ? htmlspecialchars($_POST['regid']) : ''; ?>" oninput="clearSuccessMessage()">
            <?= $validator->error('regid'); ?>
        </div>
    </div>

    <button type="submit" name="insert">Submit</button>
</form>

</body>
</html>

<?php include("footer.php"); ?>

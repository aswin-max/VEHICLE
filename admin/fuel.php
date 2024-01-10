<?php
include("sidebar.php");
$file = new FileUpload();
$dao = new DataAccess();

$rules = array(
    "fname" => array("required" => true, "alphaonly" => true)
);

$validator = new FormValidator($rules);
$successMessage = ""; // Initialize the variable to hold the success message

if (isset($_POST["insert"])) {

    if ($validator->validate($_POST)) {

        $data = array(
            'fname' => $_POST['fname'],
        );

        if ($dao->insert($data, "fuel")) {
            $successMessage = 'New record created successfully';
            $_POST['fname'] = ''; // Clear the text box value in $_POST
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
    echo "<div id='successMessage' style='color: green;'>{$successMessage}</div>";
}
?>

<form action="" method="POST" encfuel="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            fname:
            <input fuel="text" name="fname" class="form-control" value="<?= isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>" oninput="clearSuccessMessage()">
            <?= $validator->error('fname'); ?>
        </div>
    </div>

    <button fuel="submit" name="insert">Submit</button>
</form>

</body>
</html>

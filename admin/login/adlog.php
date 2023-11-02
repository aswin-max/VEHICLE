<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <?php require('../../config/autoload.php'); ?>
    <?php
    $dao = new DataAccess();

    $elements = ["offuser" => "", "offpass" => ""];
    $form = new FormAssist($elements, $_POST);
    $rules = [
        'offuser' => ['required' => true],
        'offpass' => ['required' => true],
    ];
    $validator = new FormValidator($rules);

    if (isset($_POST['login'])) {
        if ($validator->validate($_POST)) {
            $username = $_POST['offuser'];
            $password = $_POST['offpass'];

            // Replace this condition with your actual login logic
            if ($username === "abi" && $password === "admin123") {
                // Start a session and store the username
                session_start();
                $_SESSION['username'] = $username;
                
                // Redirect to a protected page (e.g., sidebar.php)
                header("Location: /vehicle/admin/sidebar.php");
                exit;
            } else {
                $msg = "Invalid username or password";
                echo "<script>alert('Invalid username or password');</script>";
            }
        }
    }
    ?>

    <form class="login" method="POST">
        <input type="text" name="offuser" placeholder="Username">
        <input type="password" name="offpass" placeholder="Password">
        <input type="submit" name="login" value="Login" class="button">
    </form>
</body>

</html>

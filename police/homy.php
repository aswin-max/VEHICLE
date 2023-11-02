<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>MVD</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        /* Side Panel styles */
        .side-panel {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background: #333;
            transition: all 0.3s;
        }

        .side-panel.active {
            left: 0;
        }

        /* Side Panel Content styles */
        .side-panel-content {
            padding: 20px;
            color: #fff;
        }

        /* Hamburger Button styles */
        .hamburger-btn {
            position: fixed;
            left: 20px;
            top: 20px;
            cursor: pointer;
            color: #fff;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <!-- Hamburger Button to open the side panel -->
    <div class="hamburger-btn" id="hamburgerBtn">
        &#9776; <!-- Unicode character for the hamburger icon -->
    </div>

    <!-- Side Panel -->
    <div class="side-panel" id="sidePanel">
        <div class="side-panel-content">
            <ul>
                <li><a href="login.php"><i class="fa fa-user s_color"></i> My Account</a></li>
                <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
            </ul>
        </div>
    </div>

    <!-- Rest of your content -->
    <!-- ... -->
    
    <!-- JavaScript to toggle the side panel -->
    <script>
        const sidePanel = document.getElementById('sidePanel');
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        
        hamburgerBtn.addEventListener('click', () => {
            sidePanel.classList.toggle('active');
        });
    </script>
</body>
</html>

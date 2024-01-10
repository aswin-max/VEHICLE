<?php

require('../../config/autoload.php'); 
$dao=new DataAccess();?>
<?php
if(isset($_SESSION['id']))
{ 
    echo"<script> location.replace('../home.php'); </script>";

 }
else {

    echo"<script> location.replace('../home1.php'); </script>";
}
?>
<?php require('../config/autoload.php'); 



if(session_destroy()){

    header('Location:/vehicle/admin/login/adlog.php');
}
 

?>

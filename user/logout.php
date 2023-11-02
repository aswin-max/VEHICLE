<?php require('../config/autoload.php'); 



if(session_destroy()){

    header('Location:/vehicle/user/login/ownerlog.php');
}
 

?>

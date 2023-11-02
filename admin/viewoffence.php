
<?php require('../config/autoload.php'); ?>

<?php
include("sidebar.php");
$dao=new DataAccess();



?>
<?php  ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-8">
                <table  border="3" class="table" style="margin-top:50px;">
                    <tr>
                        
                        <th>Id</th>
                        <th>OFFENCE</th>
                        <th>AMOUNT</th>
                        
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
   
<?php

    
    $actions=array(
        
    'edit'=>array('label'=>'Edit','link'=>'editoffence.php','params'=>array('id'=>'fine_id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deleteoffence.php','params'=>array('id'=>'fine_id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );
    

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('fine_id'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('fine_id','offence','amount');

    $users=$dao->selectAsTable($fields,'fine',"status=1",$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    
            
            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
    




<?php

include("sidebar.php");

$dao=new DataAccess();


?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-8">
                <table  border="3" class="table" style="margin-top:50px;">
                    <tr>
                        
                        <th>Id</th>
                        <th>REGISTRATION NUMBER</th>
                        <th>NAME</th>
                        
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
   
<?php

    
    $actions=array(
        
    'edit'=>array('label'=>'Edit','link'=>'editrto.php','params'=>array('id'=>'rid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deleterto.php','params'=>array('id'=>'rid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );
    

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('rid'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('rid','regid','rname');

    $users=$dao->selectAsTable($fields,'rto',"status=1",$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    
            
            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    <?php include("footer.php"); ?>
    
    
    

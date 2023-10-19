
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>SId</th>
                        <th>Vehicles:</th>
                        <th>Near School:L</th>
                        <th>In Ghat Roads:</th>
                        <th>Within Corporation/ Municipality limits :</th>
                        <th>National Highway:</th>
                        <th>State Highway:</th>
                        <th>Four Lane Road:</th>
                        <th>All other Places:</th>
                      
                     
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('sid')
        
        
    );

   
    $fields=array('sid','vehicle','school','ghat','corporation','national','state','fourline','other');

    $users=$dao->selectAsTable($fields,'speed as s',1,null,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

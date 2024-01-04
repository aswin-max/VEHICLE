<?php 
 require('../config/autoload.php'); 
include("header.php");	?>


<?php
//session_start();
$dao=new DataAccess();
	    ?>
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> MISSING DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                       
                
                        <th>Vehicle NO</th>
                         <th>Owner name</th>
                         <th>location</th>
                         <th>Missing date</th>
                     
                      
                      
                    </tr>
<?php
    
    $actions=array(
    
    );

 

   $condition="m.status=2";
   
   $join = array(
    'vehicle as v' => array('v.vid=m.vid', 'join'),
    'owner as o' => array('o.vid=m.vid', 'join'),
     

    
    
); 
	$fields=array('v.vrno as c','o.owname as d','m.loc','m.date as e');

    $users=$dao->selectAsTable($fields,' missing as m ',$condition,$join);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form method="POST" enctype="multipart/form-data">

</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->


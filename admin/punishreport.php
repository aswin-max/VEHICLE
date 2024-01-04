<?php 

include("sidebar.php");	?>


<?php
//session_start();
$dao=new DataAccess();
$abc=$_SESSION['todate'];
	    ?>
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> PUNISHMENT DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                       
                        <th>Punishment Name</th>
                        <th>Punishment date</th>
                        <th>Vehicle NO</th>
                         <th>Owner name</th>
                         <th>Payment date</th>
                     
                      
                      
                    </tr>
<?php
    


 
    print_r($_SESSION);
   
    $condition = "p.date<=" . $abc . " and p.status=2";
   $join = array(
    'payment as pay' => array('pay.pid=p.pid', 'join'),
    'vehicle as v' => array('v.vid=p.vid', 'join'),
    'owner as o' => array('o.vid=p.vid', 'join'),
       'fine as f' => array('f.fine_id=p.fine_id', 'join'),

    
    
); 
	$fields=array('f.offence as a','p.date','v.vrno as c','o.owname as d','pay.pdate as e');

    $users=$dao->selectAsTable($fields,' punish as p ',$condition,$join);
    
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


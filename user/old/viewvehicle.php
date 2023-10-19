<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");

$dao=new DataAccess();
$name=$_SESSION['email'] ;


?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-11">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>VEHICLE NUMBER</th>
                        <th>RTO-Office</th>
                        <th>Owner-Name</th>
                        <th>Vehicle-Name</th>
                        <th>Fuel</th>
                        <th>Colour</th>
                        <th>DATE OF REGISTRATION</th>
                                         
                    </tr>
<?php
    
    $actions=array(

    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('vid')
        
        
    );
    $condition="email='".$name."' and status=1";
  
   $join=array(
        'rto as r'=>array('r.rid=v.rid','join'),
    );  $fields=array('vid','regvehicle','v.rid','regowner',
     'owneraddress','email','vehicle','type','fuel','color','mdate','taxno',
     'amount','paidfrom','paidto','regdate','regvalidityfrom',
     'v.regvalidityto');

    $users=$dao->selectAsTable($fields,'vehicledetails as v',$condition,null,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

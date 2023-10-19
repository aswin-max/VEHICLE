
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); 

$q10="select * from  vehicledetails where status=1 and email='$a'" ;
$info121=$dao->query($q10);
?>
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>VEHICLE NUMBER</th>
                        <th>REGISTERED NUMBER</th>
                        <th>RTO-Office</th>
                        <th>Owner-Name</th>
                        <th>Owner-Address</th>
                        <th>Email-Address</th>
                        <th>Vehicle-Name</th>
                        <th>PAYMENT</th>
                     
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Payment','link'=>'taxpay.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success')),
    
    


    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('vid')
        
        
    );

   
   $join=array(
        'rto as r'=>array('r.rid=v.rid','join'),
    ); 
    $condition="v.status=1 email='".$a."'" ;
     $fields=array('vid','regvehicle','r.rname','regowner','owneraddress','email','vehicle');

    $users=$dao->selectAsTable($fields,'vehicledetails as v',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

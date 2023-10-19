
<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");
$dao=new DataAccess();
$a=$_SESSION['email'] ;


//$_SESSION['amount']=$info[0]["amount"];






?>
<?php  ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>

                        <th>ID</th>
                        <th>REGISTERED NUMBER</th>
                        <th>RTO-OFFICE</th>
                        <th>REGISTERED OWNER</th>
                        <th>OWNER ADDRESS</th>
                        <th>REGISTERED-EMAIL</th>
                        <th>VEHICLE</th>
                        <th>TAX NUMBER</th>
                        <th>TAX AMOUNT</th>
                        <th>regvalidityfrom</th>
                        <th>regvalidityto</th>
                        <th>PAYMENT</th>
                        
                        
                      
                    </tr>
<?php
    
    $actions=array(
        'payment'=>array('label'=>'PAYMENT','link'=>'taxpay.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success'))
    
        
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('vid')
        
        
    );
    
                    
    $join=array(
        'rto as r'=>array('r.rid=v.rid','join')
    ); 
    $condition="v.status=1 and email='".$a."'";

 $fields=array('vid','regvehicle','r.rname','regowner','owneraddress','email','vehicle',
 'taxno','amount','regvalidityfrom','regvalidityto');

 $users=$dao->selectAsTable($fields,'vehicledetails as v',$condition,$join,$actions,$config);
 
 echo $users;           
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

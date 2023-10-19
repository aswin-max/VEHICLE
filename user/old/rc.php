<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");
$dao=new DataAccess();
$a=$_SESSION['vid'] ;

echo $a;

 $_SESSION['vid']=$a;
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
                        <th>Body-Type</th>
                        <th>Fuel</th>
                        <th>Colour</th>
                        <th>Manufacturing-date</th>
                        
                        <th>TAX LICENECE NO</th>
                        <th>TAX AMOUNT</th>
                        <th>DATE OF REGISTRATION</th>
                        <th>REGISTRATION VALIDITY FROM</th>
                        <th>REGISTRATION VALIDITY TO</th>
                        <th>DOCUMENTS</th>
                     
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'VIEW','link'=>'rcupdate.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success')),
    

    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('vid')
            
        );
    

        $condition="v.status=1";
   
   $join=array(
        'rto as r'=>array('r.rid=v.rid','join'),
    ); 
     $fields=array('vid','regvehicle','r.rname','regowner','owneraddress','email','vehicle','type','fuel','color',
     'mdate','taxno','amount','regdate','regvalidityfrom','regvalidityto');

    $users=$dao->selectAsTable($fields,'vehicledetails as v',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

    


<?php include("sidebar.php");
include("dbconn.php");

$dao=new DataAccess();


?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-11">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>SL NO.</th>
                        <th>Vehicle-NUMBER</th>
                        <th>Vehicle-Name</th>
                        
                        <th>OFFICER</th>
                        <th>LOCATION</th>
                        <th>DATE OF OFFENCE</th>
                        <th>EDIT/DELETE</th>   
                    </tr>
<?php
    
    $actions=array(
        
        'edit'=>array('label'=>'Edit','link'=>'editpunish.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
        
        'delete'=>array('label'=>'Delete','link'=>'deletepunish.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success'))
        
        );

    $config=array(
        
       
        
        
    );
    //$condition="email='".$name."' and status=1";
  
   $join=array(
        'vehicle as v'=>array('v.vid=p.vid','join'),
        'fine as f'=>array('f.fine_id=p.fine_id','join'),
        
    );  $fields=array('pid','v.vrno as vrno','v.vehiclename as vehiclename','p.offname as offname','p.loc','p.date');

    $users=$dao->selectAsTable($fields,'punish as p','p.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    //'r.rname as rname',
                   
    
?>


             
                </table>
            </div>    
<
            
            
            
            
        </div><!-- End row -->







    
    </div><!-- End container -->
    
    </div><!-- End container_gray_bg -->
    
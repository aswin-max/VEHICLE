
<?php include("sidebar.php");
//include("dbconn.php");

$dao=new DataAccess();



?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-11">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>SLNO.</th>
                        <th>RTO-Office</th>
                        <th>Vehicle-NUMBER</th>
                        <th>Vehicle-Name</th>
                        <th>Fuel</th>
                        <th>TYPE</th>
                        <th>Colour</th>
                        <th>DATE OF REGISTRATION</th>
                        <th>RC BOOK</th> 
                        <th>EDIT/DELETE</th>  
                    </tr>
<?php
     $actions=array(
        
       'edit'=>array('label'=>'Edit','link'=>'editvehicle.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success')),
        
        'delete'=>array('label'=>'Delete','link'=>'deletevehicle.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success'))
        
        );

    $config=array(
    
         'images'=>array(
                        'field'=>'rc',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
        
    );
    //$condition="email='".$name."' and status=1";
  
   $join=array(
        'rto as r'=>array('r.rid=v.rid','join'),
        'type as t'=>array('t.tid=v.tid','join'),
        'fuel as f'=>array('f.fid=v.fid','join'),
    );  $fields=array('v.vid','r.rname as rname','v.vrno','v.vehiclename','f.fname as fname','t.tname as tname','v.color','v.date','v.rc');

    $users=$dao->selectAsTable($fields,'vehicle as v',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

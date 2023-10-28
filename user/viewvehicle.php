<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");

$dao=new DataAccess();



?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-11">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>VEHICLE NUMBER</th>
                        <th>RTO-Office</th>
                        <th>Vehicle-NUMBER</th>
                        <th>Owner-Name</th>
                        <th>Vehicle-Name</th>
                        <th>Fuel</th>
                        <th>TYPE</th>
                        <th>Colour</th>
                        <th>DATE OF REGISTRATION</th>
                        <th>RC BOOK</th>   
                    </tr>
<?php
    
    $actions=array(

    );

    $config=array(
        
        'srno'=>true,
        'hiddenfields'=>array('vid'),
'actions_td'=>false,
         'images'=>array(
                        'field'=>'rc',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:250px;'))
        
        
        
    );
    //$condition="email='".$name."' and status=1";
  
   $join=array(
        'rto as r'=>array('r.rid=v.rid','join'),
        'type as t'=>array('t.tid=v.tid','join'),
        'fuel as f'=>array('f.fid=v.fid','join'),
    );  $fields=array('vrno','vname','r.rname as rname','vehiclename','f.fname as fname','t.tname as tname','color','dor','rc');

    $users=$dao->selectAsTable($fields,'vehicle as v',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

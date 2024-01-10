
<?php 
include("sidebar.php");


$dao=new DataAccess();


?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-11">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th>SL NO.</th>
                        
                        <th>RTO NAME</th>
                        
                        <th>OFFICER</th>
    
                        <th>PICTURE</th>  
                        <th>EDIT/DELETE</th>   
                    </tr>
<?php
    
    $actions=array(
        
        'edit'=>array('label'=>'Edit','link'=>'editofficer.php','params'=>array('id'=>'offid'),'attributes'=>array('class'=>'btn btn-success')),
        
        'delete'=>array('label'=>'Delete','link'=>'deleteofficer.php','params'=>array('id'=>'offid'),'attributes'=>array('class'=>'btn btn-success'))
        
        );

    $config=array(
        
       
         'images'=>array(
                        'field'=>'offimg',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
        
    );
    //$condition="email='".$name."' and status=1";
  
   $join=array(
       
        'rto as r'=>array('r.rid=p.rid','join'),
        
    );  $fields=array('p.offid','r.rname','p.offuser as offname','p.offimg');

    $users=$dao->selectAsTable($fields,'officer as p','p.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    //'r.rname as rname',
                   
    
?>


             
                </table>
            </div>    
<
            
            
            
            
        </div><!-- End row -->







    
    </div><!-- End container -->
    
    </div><!-- End container_gray_bg -->
    
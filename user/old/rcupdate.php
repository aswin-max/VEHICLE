
<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");
$dao=new DataAccess();
$a=$_SESSION['vid'] ;




?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                
                    <th>ID</th>
                        <th>RC-BOOK</th>
                        <th>INSURANCE</th>
                        <th>POLLUTION-PAPER</th>
                        <th>FITNESS PAPER</th>
                        <th>PAN CARD</th>
                        <th>DATE OF BIRTH-PROOF</th>
                        <th>ADDRESS-PROOF</th>
                        <th>TAX-CLEARANCE CERTIFICATE</th>
                        <th>IMAGE</th>
                        <th>CHANGE</th>
        
                     
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
        'edit'=>array('label'=>'REQUEST','link'=>'updatevehicle.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success')),
    


    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('vid'),
    'actions_td'=>false,
    'rc'=>array( 'field'=>'rc','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'insrns'=>array( 'field'=>'insrns','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'poltn'=>array( 'field'=>'poltn','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'fp'=>array( 'field'=>'fp','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'pan'=>array( 'field'=>'pan','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'dob'=>array( 'field'=>'dob','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'addressproof'=>array( 'field'=>'addressproof','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'tax'=>array( 'field'=>'tax','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;')),
    'img'=>array( 'field'=>'img','path'=>'../uploads/','attributes'=>array('style'=>'width:100px;'))
            
        );
    
        $config=array(
            'srno'=>true,
            'hiddenfields'=>array('vid'),
            'actions_td'=>false,
            'images'=>array(
                           'field'=>'img',
                           'path'=>'../uploads/',
                           'attributes'=>array('style'=>'width:100px;'))
            );

   
   $join=array(
        'rto as r'=>array('r.rid=v.rid','join'),
    ); 
     $fields=array('vid','rc','insrns','poltn','fp',
     'pan','dob','addressproof','tax','img');

    $users=$dao->selectAsTable($fields,'vehicledetails as v',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    </div>


</form>
</div>
    


<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");
$dao=new DataAccess();
$a=$_SESSION['vid'] ;
$b=$_SESSION['pid'] ;
$_SESSION['pid'] =$b;


$q="select * from epunishment where vehicleno='$a'";

$info=$dao->query($q);


$_SESSION['amount']=$info[0]["amount"];
 
 $_SESSION['vid']=$a;




?>
<?php //include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>

                        <th>ID</th>
                        <th>REGISTERED NUMBER</th>
                        <th>LOCATION</th>
                        <th>epunishMENT</th>
                        <th>epunishMENT-AMOUNT</th>
                        <th>REGISTERED-EMAIL</th>
                        <th>PETITION-DATE</th>
                        <th>EXPIRE-DATE</th>
                        <th>PAYMENT</th>
                        
                        
                      
                    </tr>
<?php
    
    $actions=array(
        'payment'=>array('label'=>'PAYMENT','link'=>'view.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success'))
    
        
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pid')
        
        
    );
    
                    
    $join=array(
        'offence as o'=>array('o.oid=p.oid','join')
    ); 
    $condition="p.status=1 and vehicleno='".$a."'";

 $fields=array('pid','vehicleno','location','o.oname','amount','email','pdate','ldate');

 $users=$dao->selectAsTable($fields,'epunishment as p',$condition,$join,$actions,$config);
 
 echo $users;           
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

<?php //include("oghead.php");	?>
<?php require('../config/autoload.php'); 
include("dbconn.php");
?>

<?php
session_start();
$dao=new DataAccess();
   $date1=$_SESSION['fdate'] ;
 $date2=$_SESSION['fdate'] ;
   if(isset($_POST["list"]))
{
     header('location:header.php');
}

	 
	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> BOOKING DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Room No</th>
                        <th>From Date</th>
                         <th>To Date</th>
                     
                      
                      
                    </tr>
<?php
    
    $actions=array(
    
    
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pid')
        
        
    );

   $condition="p.date='".$date1."' and status=1";
   
   $join=array(
    'vehicle as v'=>array('v.vid=p.vid','join'),
    'fine as f'=>array('f.fine_id=p.fine_id','join'),
    //'rto as r'=>array('r.rid=p.rid','join'),
    'officer as off'=>array('off.offid=p.offid','join'),
    
);
	$fields=array('pid','v.vrno as vrno','v.vehiclename as vehiclename','off.offname as offname','p.loc','p.date','p.pic','datefrom','todate');

    $users=$dao->selectAsTable($fields,'epunish as p',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form action="" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="list" >Home</button>


</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->


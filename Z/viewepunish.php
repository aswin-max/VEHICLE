<?php require('../config/autoload.php')?>
<?php include('header.php');


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
                        <th>OFFENCE</th>
                        
                        <th>OFFICER</th>
                        <th>LOCATION</th>
                        <th>DATE OF OFFENCE</th>
                         
                        <th>AMOUNT</th> 
                        <th>PICTURE</th>  
                    </tr>
<?php
    
    $actions=array(

    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pid'),
         'images'=>array(
                        'field'=>'pic',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
        
    );
    
?> 
<?php

    echo"hi";
    $a = $_SESSION['id'];
   echo $a;
    $join = array(
        'owner as o' => array('o.vid = p.vid', 'join'),
        'fine as f'=>array('f.fine_id=p.fine_id','join'),
    );
    $fields = array('p.vid', 'o.owno','o.vid as vd','sum(f.amount) as sum');

   
    $users = $dao->getDataJoin($fields, 'epunish as p', 'p.status = 1 and o.owno = '.$a, $join);
if(isset($users[0]['vd']))
{
     $msg1="";
    $join=array(
        'vehicle as v'=>array('v.vid=p.vid','join'),
        'fine as f'=>array('f.fine_id=p.fine_id','join'),
       
        'officer as off'=>array('off.offid=p.offid','join'),

        
        
    );  $fields=array('pid','v.vrno as vrno','f.offence as offence','off.offuser as offname','p.loc','p.date','f.amount','p.pic');
echo $users[0]['vd'];
    $users12=$dao->selectAsTable($fields,'epunish as p','p.status=1 and p.vid='.$users[0]['vd'],$join,$actions,$config);
    if(!empty($users12))  
       echo $users12;

}
else
{
 $msg="no records found";
 echo $msg;
 $msg1="hidden";


}
     if(isset($_POST["insert"])) {

         
        echo"<script> location.replace('pay/pay.php'); </script>";


 
}
?>


             
                </table>
            </div>    
<
            
            
            
            
        </div><!-- End row -->


 <html>
<head>
     <style>
        /* CSS for the clickable button */
        .clicky-button {
            background-color: #0074D9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add a smooth transition */
        }

        /* CSS for the hover effect */
        .clicky-button:hover {
            background-color: #0056B3; /* Change the background color on hover */
        }
    </style> 
 </head>

<body>
<form method="POST">
    <button name="insert" class="clicky-button" id="myButton" <?=$msg1?>>Pay <?=$users[0]['sum']?></button>

     <!-- <script>
        // JavaScript to handle the button click and navigate to a new page
        document.getElementById("myButton").addEventListener("click", function() {
            // Change the page location to the desired URL
            window.location.href = "pay/pay.php";
        });
    </script>  -->
</form>
</body>
</html> 




    
    </div><!-- End container -->
    
    </div><!-- End container_gray_bg -->
    
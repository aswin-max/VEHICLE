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
                    <th>SL NO.</th>
                        <th>Vehicle-NUMBER</th>
                        <th>Vehicle-Name</th>
                        
                        <th>OFFICER</th>
                        <th>LOCATION</th>
                        <th>DATE OF OFFENCE</th>
                        <th>PICTURE</th>   
                    </tr>
<?php
    
    $actions=array(

    );

    $config=array(
        

         'images'=>array(
                        'field'=>'pic',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
        
    );
    //$condition="email='".$name."' and status=1";
  
   $join=array(
        'vehicle as v'=>array('v.vid=p.vid','join'),
        'fine as f'=>array('f.fine_id=p.fine_id','join'),
        //'rto as r'=>array('r.rid=p.rid','join'),
        'officer as off'=>array('off.offid=p.offid','join'),
        
    );  $fields=array('pid','v.vrno as vrno','v.vehiclename as vehiclename','off.offname as offname','p.loc','p.date','p.pic');

    $users=$dao->selectAsTable($fields,'punish as p','p.status=1',$join,$actions,$config);
    
    echo $users;
                    
                    //'r.rname as rname',
                   
    
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
    <button class="clicky-button" id="myButton">Click me</button>

    <script>
        // JavaScript to handle the button click and navigate to a new page
        document.getElementById("myButton").addEventListener("click", function() {
            // Change the page location to the desired URL
            window.location.href = "pay/pay.php";
        });
    </script>
</body>
</html>




    
    </div><!-- End container -->
    
    </div><!-- End container_gray_bg -->
    
<?php require('../../config/autoload.php')?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    
  </head>
<?php include('../header.php');

$dao = new DataAccess();

?>


<?php

$actions=array(
        
    
    
    'delete'=>array('label'=>'Delete','link'=>'deletepunish.php','params'=>array('id'=>'vid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

                    $config=array(
      
      
                        'images'=>array(
                                       'field'=>'rc',
                                       'path'=>'../../uploads/',
                                       'attributes'=>array('style'=>'width:100px;'))
                       
                       
                       
                   );
                   //$condition="email='".$name."' and status=1";
                 $a = $_SESSION['id'];
                  $join=array(
                       'rto as r'=>array('r.rid=v.rid','join'),
                       
                       'owner as o'=>array('o.vid=v.vid','join'),
                   );  $fields=array('v.vid as vid','v.vrno as vrno','r.rname as rname','v.vehiclename as vehiclename','v.dor as dor','v.rc as rc');
               
                   $users=$dao->selectAsTable($fields,'vehicle as v','o.owno = '.$a,$join,$actions,$config);
                   
                    
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- --------------------------------------------------------
------------------------------------------------
----------------------------------------------------------------
-------------------------------------------------------------
-->



  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5"></h2>

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            

              
                </label>
          
              
              <th scope="col">RC NUMBER</th>
              <th scope="col">RTO-OFFICE</th>
              <th scope="col">Vehicle-NAME</th>
              <th scope="col">DATE OF REGISTRATION</th>
              <th scope="col">RC BOOK</th>
              <th scope="col">ACTIONS</th>
            
          </thead>
          <tbody>  
           <?php 
               if (!empty($users))
                {
                echo  $users  ;
                echo '<tr class="spacer"><td colspan="100"></td></tr>';
            } else {
                echo '<tr><td colspan="8">No records found</td></tr>';
            }     
            
      ?>
      
          </tbody>
        </table>
      </div>


    </div>

  </div>






    


<!-- Display the Total Amount -->

    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



    <style>
        /* CSS for the clickable button */
        .clicky-button {
            background-color: #0074D9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            margin-left: 700px;
            
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add a smooth transition */
        }

        /* CSS for the hover effect */
        .clicky-button:hover {
            background-color: #0056B3; /* Change the background color on hover */
        }
    </style> 


<?php




?>

  </body>
</html>
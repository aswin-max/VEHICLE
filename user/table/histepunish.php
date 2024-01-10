<?php require('../../config/autoload.php')?>
<?php include('../header.php');

$dao = new DataAccess();

?>


<?php
                     $config=array(
        

                        'images'=>array(
                                       'field'=>'pic',
                                       'path'=>'../uploads/',
                                       'attributes'=>array('style'=>'width:100px;'))
                       
                       
                       
                   );
                    $a = $_SESSION['id'];
                    $join = array(
                        'owner as o' => array('o.vid = p.vid', 'join'),
                    );
                    $fields = array('p.vid', 'o.owno', 'o.vid as vd');

                    $users = $dao->getDataJoin($fields, 'epunish as p', 'o.owno = ' . $a, $join);

                    
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
    <link rel="stylesheet" href="css/style.css">

    
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">CHALLAN</h2>

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <th scope="col">DATE</th>
              <th scope="col">INVOICE ID</th>
              
              <th scope="col">RC NUMBER</th>
              <th scope="col">INVOICE</th>
           
          </thead>
          <tbody>
            
                  
                  
           <?php 
           if (!empty($users) && isset($users[0]['vd'])) 
           {


            
            $join = array(
                'vehicle as v' => array('v.vid=p.vid', 'join'),
                'epayment as pay' => array('pay.pid=p.pid', 'join'),
                
            );
            $fields = array('p.pid as pid','pay.invid as invid', 'v.vrno as vrno', 'pay.pdate as date',);
            $users12 = $dao->getDataJoin($fields, 'epunish as p', 'p.status=2 and p.vid=' .$users[0]['vd'], $join);  
               if (!empty($users12)) {
                            foreach ($users12 as $row) { 


                
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['invid'] . '</td>';
                echo '<td>' . $row['vrno'] . '</td>';
               
               echo'<td> <button name="add" class="btn btn-success"><a href="../einvoice.php">VIEW</button></td>';
               
                echo '<tr class="spacer"><td colspan="100"></td></tr>';

              }
            } else {
                echo '<tr><td colspan="8">No records found</td></tr>';
            }
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
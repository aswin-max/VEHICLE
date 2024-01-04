<?php require('../../config/autoload.php')?>
<?php include('../header.php');

$dao = new DataAccess();

?>


<?php
     $actions=array(
        
       'found'=>array('label'=>'FOUND','link'=>'foundmiss.php','params'=>array('id'=>'mid'),'attributes'=>array('class'=>'btn btn-success'))
        
        );
        $config=array(
        
            'hiddenfields' => array('mid'),
            'images'=>array(
                           'field'=>'pic',
                           'path'=>'../../uploads/',
                           'attributes'=>array('style'=>'width:100px;'))
           
           
           
       );

        $join = array(
            'vehicle as v' => array('v.vid=m.vid', 'join'),
            'owner as o' => array('o.owno=m.owno', 'join'),
        );
        $fields = array('mid','date','v.vrno as vrno', 'loc', 'o.owname as owname', 'm.pic');
        $users = $dao->selectAsTable($fields, 'missing as m','m.status=2',$join,$actions,$config);  
    
         
                    
                   
    
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
  <?php
    if (isset($_POST['add'])) {

   echo "<script> location.replace('../addmiss.php'); </script>";
}
?>

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">CHALLAN</h2>

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>  

              
             
              <th scope="col">DATE</th>
              <th scope="col">RC NUMBER</th>
              <th scope="col">LOCATION</th>
              <th scope="col">OWNER</th>
              <th scope="col">IMAGE</th>
              <th scope="col">ACTION</th> 
            </tr>
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
     


  <style>
        /* CSS for the clickable button */
        .clicky-button {
            background-color: #0074D9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            margin-left: 300px;
            
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add a smooth transition */
        }

        /* CSS for the hover effect */
        .clicky-button:hover {
            background-color: #0056B3; /* Change the background color on hover */
        }
    </style> 
 
      
          </tbody>
        </table> <form method="POST">
      <button name="add" class="clicky-button">ADD</button>
      
  </form> 
      </div>


    </div>

  </div>









?>
   
    


<!-- Display the Total Amount -->

    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



    

<?php




?>

  </body>
</html>
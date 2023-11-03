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
                        'fine as f' => array('f.fine_id=p.fine_id', 'join'),
                    );
                    $fields = array('p.vid', 'o.owno', 'o.vid as vd', 'sum(f.amount) as sum');

                    $users = $dao->getDataJoin($fields, 'punish as p', 'p.status = 1 and o.owno = ' . $a, $join);

                    
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

    <title>Table #4</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">Table #4</h2>

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>  

              <th scope="col">
                <label class="control control--checkbox">
                  <input type="checkbox"  class="js-check-all"/>
                  <div class="control__indicator"></div>
                </label>
              </th>
              
              <th scope="col">DATE</th>
              <th scope="col">RC NUMBER</th>
              <th scope="col">OFFENCE</th>
              <th scope="col">LOCATION</th>
              <th scope="col">OFFICER</th>
              <th scope="col">AMOUNT</th>
              <th scope="col">IMAGE</th>
            </tr>
          </thead>
          <tbody>
            
                  
                  
           <?php 
           if (!empty($users) && isset($users[0]['vd'])) 
           {
               $msg1 = "";
               $join = array(
                   'vehicle as v' => array('v.vid=p.vid', 'join'),
                   'fine as f' => array('f.fine_id=p.fine_id', 'join'),
                   'officer as off' => array('off.offid=p.offid', 'join'),
               );
               $fields = array('p.pid', 'v.vrno as vrno', 'f.offence as offence', 'off.offuser as offname', 'p.loc as loc', 'p.date as date', 'f.amount as amo', 'p.pic as pic');
               $users12 = $dao->getDataJoin($fields, 'punish as p', 'p.status=1 and p.vid=' .$users[0]['vd'], $join);  
               if (!empty($users12)) {
                            foreach ($users12 as $row) { 


                echo'<tr scope="row">';
                echo '<th scope="row">';
                echo '<label class="control control--checkbox">';
                echo '<input type="checkbox"/>';   
                echo '<div class="control__indicator"></div>';
                echo '</label>';
                echo '</th>';
                echo '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['vrno'] . '</td>';
                echo '<td>' . $row['offence'] . '</td>';
                echo '<td>' . $row['loc'] . '</td>';
                echo '<td>' . $row['offname'] . '</td>';
                echo '<td>' . $row['amo'] . '</td>';
                echo '<td><img src="../../uploads/' . $row['pic'] . '" style="width: 100px;" /></td>';
                echo '</tr>';
                echo '<tr class="spacer"><td colspan="100"></td></tr>';
              }
            } else {
                echo '<tr><td colspan="8">No records found</td></tr>';
            }
        } else {
            $msg = "no records found";
            echo $msg;
            $msg1 = "hidden";
        } 

                                   
                                    
                
            
      ?>
      
          </tbody>
        </table>
      </div>


    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
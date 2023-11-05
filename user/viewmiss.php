
<?php include('sidebar.php');

$dao = new DataAccess();

?>


<?php
                //      $config=array(
        

                //         'images'=>array(
                //                        'field'=>'pic',
                //                        'path'=>'../uploads/',
                //                        'attributes'=>array('style'=>'width:100px;'))
                       
                       
                       
                //    );
                //     $a = $_SESSION['id'];
                //     $join = array(
                //         'owner as o' => array('o.vid = p.vid', 'join'),
                //         'fine as f' => array('f.fine_id=p.fine_id', 'join'),
                //     );
                //     $fields = array('p.vid', 'o.owno', 'o.vid as vd', 'sum(f.amount) as sum');

                //     $users = $dao->getDataJoin($fields, 'epunish as p', 'p.status = 1 and o.owno = ' . $a, $join);

                    
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
  if(isset($_POST['verify']))
   {
    $sql = "update missing set status=2";

$conn->query($sql);




   }


?>


  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">CHALLAN</h2>

      <div class="table-responsive custom-table-responsive">

        <table class="table custom-table">
          <thead>
            <tr>  

              <th scope="col">
                </label>
              </th>
              
              <th scope="col">DATE</th>
              <th scope="col">RC NUMBER</th>
              <th scope="col">LOCATION</th>
              <th scope="col">OWNER</th>
              <th scope="col">IMAGE</th>
            </tr>
          </thead>
          <tbody>
            
                  
                  
           <?php 
               $msg1 = "";
               $join = array(
                   'vehicle as v' => array('v.vid=m.vid', 'join'),
                   'owner as o' => array('o.owno=m.owno', 'join'),
               );
               $fields = array('date','v.vrno as vrno', 'loc', 'o.owname as owname', 'pic');
               $users12 = $dao->getDataJoin($fields, 'missing as m',1, $join);  
               if (!empty($users12)) {
                            foreach ($users12 as $row) { 


                echo'<tr scope="row">';
                echo '<th scope="row">';
                
               
                echo '<div class="control__indicator"></div>';
                echo '</label>';
                echo '</th>';
                echo '</td>';
                echo '<td>' . $row['date'] . '</td>';
                echo '<td>' . $row['vrno'] . '</td>';
                echo '<td>' . $row['loc'] . '</td>';
                echo '<td>' . $row['owname'] . '</td>';
                echo '<td><img src="../../uploads/' . $row['pic'] . '" style="width: 100px;" /></td>';
                echo '</tr>';
                echo '<tr class="spacer"><td colspan="100"></td></tr>';


               
              }
            } else {
                echo '<tr><td colspan="8">No records found</td></tr>';
            }
        

                        
                                    
                
            
      ?>
            
          </tbody>
        </table><form method="POST">
    <button name="verify" class="btn btn-primary mr-2">verify</button>
</form>      
      </div>


    </div>

  </div>






  



   
    


<!-- Display the Total Amount -->

    

    



  </body>
</html>
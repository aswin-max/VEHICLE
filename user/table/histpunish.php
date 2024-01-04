<?php require('../../config/autoload.php')?>
<?php include('../header.php');

$dao = new DataAccess();

?>


<?php
                     $config=array(
        

                       
                       
                   );
                    $a = $_SESSION['id'];
                    $join = array(
                        'owner as o' => array('o.vid = p.vid', 'join'),
                        'fine as f' => array('f.fine_id=p.fine_id', 'join'),
                    );
                    $fields = array('p.vid', 'o.owno', 'o.vid as vd', 'sum(f.amount) as sum');

                    $users = $dao->getDataJoin($fields, 'punish as p', 'p.status = 2 and o.owno = ' . $a, $join);

                    
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
            <tr>  

              
              <th scope="col">DATE</th>
              <th scope="col">INVOICE ID</th>
              
              <th scope="col">RC NUMBER</th>
              <th scope="col">OFFENCE</th>
              <th scope="col">AMOUNT</th>
              <th scope="col">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <form method="POST">
                  
                  
           <?php 

          $history = array();
               $msg1 = "";
               $join = array(
                   'vehicle as v' => array('v.vid=p.vid', 'join'),
                   'payment as pay' => array('pay.pid=p.pid', 'join'),
                   'fine as f' => array('f.fine_id=p.fine_id', 'join'),
                   
               );
               $fields = array('p.pid as pid', 'v.vrno as vrno', 'GROUP_CONCAT(DISTINCT f.offence) as offence', 'pay.pdate as pdate','pay.invid as invid', 'SUM(f.amount) as amo','f.amount as amount','p.date as date');
               $users12 = $dao->getDataJoin($fields, 'punish as p', 'p.status=2 and p.vid=' .$users[0]['vd'].' group by pay.invid', $join);  
               if (!empty($users12)) {
                            foreach ($users12 as $row) { 


              
                echo '<td>' . $row['pdate'] . '</td>';
                echo '<td>' . $row['invid'] . '</td>';
                echo '<td>' . $row['vrno'] . '</td>';
               
                 echo '<td>' . $row['offence'] . '</td>';
                
                
                echo '<td>' . $row['amo'] . '</td>';
                echo '<td><button class="btn btn-success" name="invoice" id="myButton" onclick="gatherData(this)" data-amount="' . $row['amount'] . '" data-pid="' . $row['pid'] . '">INVOICE</a></td>';
                echo '</tr>';
                echo '<tr class="spacer"><td colspan="100"></td></tr>';
              }
            } else {
                echo '<tr><td colspan="8">No records found</td></tr>';
            }  
                
            
      ?><input type="hidden" name="arrayData" id="arrayData"> 
      </form>
          </tbody>
        </table>
      </div>


    </div>

  </div>






 

<script>
    var myButton = document.getElementById('myButton');

    myButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior
        // gatherData();
    });

    function gatherData(daa) {
        var data = [];

        
        var element = daa; //document.querySelectorAll('#myButton');
        
            var amount = parseFloat(element.getAttribute('data-amount'));
            var pid = parseFloat(element.getAttribute('data-pid'));
            console.log(amount + pid);
            var set1 = { pid: pid, amount: amount };
            data.push(set1);
            var arrayJSON = JSON.stringify(data);
                document.getElementById('arrayData').value =arrayJSON;
        

       
        console.log(data);
        $.ajax({
            type: 'POST',
            url: 'histpunish.php', // Replace with the actual path to your server-side script
            data: { arrayData: arrayJSON },
            success: function () {
                // Redirect to the next page after successfully storing data
                window.location.href = '../histinvoice.php';
            },
            error: function () {
                // Handle errors if needed
                console.log('Error storing array data.');
            }
        });
    }
</script>

<?php
// if (isset($_POST['invoice'])) {
    
    
//     $arrayJSON =$_POST['arrayData'];
//     $arrayToStore = json_decode($arrayJSON, true);
//     $_SESSION['myArray'] = serialize($arrayToStore);
   
   
//  echo "<script> location.replace('../invoice.php'); </script>";
// }

if (isset($_POST['arrayData'])) {
  $arrayJSON = $_POST['arrayData'];
  $arrayToStore = json_decode($arrayJSON, true);
  $_SESSION['inv'] = serialize($arrayToStore);
  // You can add additional logic here if needed
  echo 'Array data stored successfully.';
  echo "<script> location.replace('../invoice.php'); </script>";
} else {
  echo 'Error: No array data received.';
}
?>
   
    


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
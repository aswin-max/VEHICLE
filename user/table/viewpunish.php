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

    
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">CHALLAN</h2>

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
                echo '<input type="checkbox" class="js-check-row" data-amount="' . $row['amo'] . '"/>';

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






  <form method="POST">
    <button name="pay" class="clicky-button" id="myButton" <?=$msg1?>>PAY 0</button>
    <input type="hidden" id="totalAmountInput" name="totalAmount" value="0">
</form>

<script>
    var mainCheckbox = document.querySelector('.js-check-all');
    var checkboxes = document.querySelectorAll('.js-check-row');

    mainCheckbox.addEventListener('change', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = mainCheckbox.checked;
        });
        calculateTotal();
    });

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            mainCheckbox.checked = [...checkboxes].every(function (checkbox) {
                return checkbox.checked;
            });
            calculateTotal();
        });
    });

    function calculateTotal() {
        var totalAmount = 0;
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                var amount = parseFloat(checkbox.getAttribute('data-amount'));
                totalAmount += amount;
            }
        });

        // Update the Total Amount on the button
        updateButton(totalAmount);

        // Update the hidden input field with the total amount
        document.getElementById('totalAmountInput').value = totalAmount;
    }

    function updateButton(totalAmount) {
        var displayTotalButton = document.getElementById('myButton');
        if (totalAmount > 0) {
            displayTotalButton.textContent = 'PAY ₹' + totalAmount;
            displayTotalButton.removeAttribute('disabled');
        } else {
            displayTotalButton.textContent = 'PAY ₹0';
            displayTotalButton.setAttribute('disabled', 'disabled');
        }
    }

    // Calculate the initial total when the page loads
    calculateTotal();
</script>

<?php
if (isset($_POST['pay'])) {
    // Retrieve the total amount from the hidden input field and set it in the session
    $totalAmount = $_POST['totalAmount'];
    $_SESSION['totalAmount'] = $totalAmount;

    echo "<script> location.replace('../pay/pay.php'); </script>";
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
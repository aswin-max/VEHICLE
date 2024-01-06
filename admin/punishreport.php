<?php 

include("sidebar.php");	?>


<?php
//session_start();
$dao=new DataAccess();

	    ?>
       <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
                <H1><center> CHALLAN DETAILS </center> </H1>
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" onchange="filterTable()">
<input type="date" id="endDate" onchange="filterTable()">
<select id="sortOption" onchange="filterTable()">
        <option></option>
            <option value="PAID">PAID</option>
            <option value="UNPAID">UNPAID</option>
            <!-- Add more options as needed -->
        </select>
    	<div class="row">
            <div class="col-md-12">
                <table id="dataTable" border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                       
                        <th>Punishment Name</th>
                        <th>Punishment date</th>
                        <th>Vehicle NO</th>
                         <th>Owner name</th>
                         <th>Payment date</th>
                         <th>Status</th>
                     
                      
                      
                    </tr>
<?php
     
    
   $join = array(
    'payment as pay' => array('pay.pid=p.pid', 'join'),
    'vehicle as v' => array('v.vid=p.vid', 'join'),
    'owner as o' => array('o.vid=p.vid', 'join'),
       'fine as f' => array('f.fine_id=p.fine_id', 'join'),
    
); 
	$fields=array('f.offence as a','p.date as b','v.vrno as c','o.owname as d','pay.pdate as e','p.status');

    $users=$dao->getDataJoin($fields,'punish as p',1,$join);
    
    if (!empty($users)) {
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user['a'] . "</td>";
            echo "<td>" . $user['b'] . "</td>";
            echo "<td>" . $user['c'] . "</td>";
            echo "<td>" . $user['d'] . "</td>";
            echo "<td>" . $user['e'] . "</td>";

            // Display status based on the value in the 'status' column
            echo "<td>";
            if ($user['status'] == 1) {
                echo "UNPAID";
            } elseif ($user['status'] == 2) {
                echo "PAID";
            }  else {
                echo "Unknown";
            }
            echo "</td>";

            echo "</tr>";
        }
    }
                                     
    ?>

             
                </table>
            </div>    


        
<form method="POST" enctype="multipart/form-data">

</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

    <script>
    function filterTable() {
        var startDate = document.getElementById("startDate").value;
        var endDate = document.getElementById("endDate").value;
        var selectedStatus = document.getElementById("sortOption").value;
        var table = document.getElementById("dataTable");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var cellDate = rows[i].getElementsByTagName("td")[1].textContent || rows[i].getElementsByTagName("td")[1].innerText;
            var cellStatus = rows[i].getElementsByTagName("td")[5].textContent || rows[i].getElementsByTagName("td")[5].innerText;

            // Check if both date and status conditions are met, show the row; otherwise, hide it
            if ((startDate === "" || isDateInRange(cellDate, startDate, endDate)) && (selectedStatus === "" || cellStatus === selectedStatus)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    function isDateInRange(cellDate, startDate, endDate) {
        // Assuming the cellDate, startDate, and endDate are in the format "yy-mm-dd"
        return cellDate >= startDate && cellDate <= endDate;
    }
</script>

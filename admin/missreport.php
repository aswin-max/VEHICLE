<?php
include("sidebar.php");

$dao = new DataAccess();
$abc = $_SESSION['todate'];
?>

<div class="container_gray_bg" id="home_feat_1">
    <div class="container">
                <H1><center> MISSING DETAILS </center> </H1>
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" onchange="filterTable()">
<input type="date" id="endDate" onchange="filterTable()">
<select id="sortOption" onchange="filterTable()">
    <option></option>
    <option value="Verifying">Verifying</option>
    <option value="Missing">Missing</option>
    <option value="Found">Found</option>
    <!-- Add more options as needed -->
</select>

    	<div class="row">
            <div class="col-md-12">
                <table id="dataTable" border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <th>Vehicle NO</th>
                        <th>Owner name</th>
                        <th>Location</th>
                        <th>Missing date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    //$condition = "m.date <= '" . $abc . "'";

                    $join = array(
                        'vehicle as v' => array('v.vid=m.vid', 'join'),
                        'owner as o' => array('o.vid=m.vid', 'join'),
                    );
                    $fields = array('v.vrno as c', 'o.owname as d', 'm.loc', 'm.date as e', 'm.status');

                    $users = $dao->getDataJoin($fields, 'missing as m',1,$join);

                    // Check if $users is a string (error message)
                    if (!empty($users)) {
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>" . $user['c'] . "</td>";
                            echo "<td>" . $user['d'] . "</td>";
                            echo "<td>" . $user['loc'] . "</td>";
                            echo "<td>" . $user['e'] . "</td>";

                            // Display status based on the value in the 'status' column
                            echo "<td>";
                            if ($user['status'] == 1) {
                                echo "Verifying";
                            } elseif ($user['status'] == 2) {
                                echo "Missing";
                            } elseif ($user['status'] == 3) {
                                echo "Found";
                            } else {
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
            var cellDate = rows[i].getElementsByTagName("td")[3].textContent || rows[i].getElementsByTagName("td")[3].innerText;
            var cellStatus = rows[i].getElementsByTagName("td")[4].textContent || rows[i].getElementsByTagName("td")[4].innerText;

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


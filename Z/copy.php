<?php require('../config/autoload.php')?>
<?php include('header.php');

$dao = new DataAccess();

?>

<div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <table border="1" class="table" style="margin-top:100px;">
                    <tr>
                        <!-- <th>SL NO.</th> -->
                        <th>Vehicle-NUMBER</th>
                        <th>OFFENCE</th>
                        <th>OFFICER</th>
                        <th>LOCATION</th>
                        <th>DATE OF OFFENCE</th>
                        <th>PICTURE</th>
                        <th>AMOUNT</th>
                        <th>Action</th>
                    </tr>
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

                    $users = $dao->getDataJoin($fields, 'epunish as p', 'p.status = 1 and o.owno = ' . $a, $join);

                    if (!empty($users) && isset($users[0]['vd'])) 
                    {
                        $msg1 = "";
                        $join = array(
                            'vehicle as v' => array('v.vid=p.vid', 'join'),
                            'fine as f' => array('f.fine_id=p.fine_id', 'join'),
                            'officer as off' => array('off.offid=p.offid', 'join'),
                        );
                        $fields = array('p.pid', 'v.vrno as vrno', 'f.offence as offence', 'off.offuser as offname', 'p.loc as loc', 'p.date as date', 'f.amount as amo', 'p.pic as pic');
                        $users12 = $dao->getDataJoin($fields, 'epunish as p', 'p.status=1 and p.vid=' .$users[0]['vd'], $join);
                        if (!empty($users12)) {
                            foreach ($users12 as $row) {
                                echo '<tr>';
                                // echo '<td>' . $row[''] . '</td>';
                                echo '<td>' . $row['vrno'] . '</td>';
                                echo '<td>' . $row['offence'] . '</td>';
                                echo '<td>' . $row['offname'] . '</td>';
                                echo '<td>' . $row['loc'] . '</td>';
                                echo '<td>' . $row['date'] . '</td>';
                                echo '<td><img src="../uploads/' . $row['pic'] . '" style="width: 100px;" /></td>';
                                echo '<td>' . $row['amo'] . '</td>';
                                echo '<input type="checkbox" name="selectedRows[]" value="' . $row['pid'] . '">';
                                echo '<td><form method="POST">

                                          <button class="clicky-button" name="payButton" value="' . $row['pid'] . '">Pay</button>
                                      </form></td>';
                                echo '</tr>';
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
                </table>
            </div>
        </div>
    </div>
</div>

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
            transition: background-color 0.3s ease;
        }

        /* CSS for the hover effect */
        .clicky-button:hover {
            background-color: #0056B3;
        }
    </style>
</head>

<body>
<form method="POST">
    <button name="insert" class="clicky-button" id="myButton" <?=$msg1?>>Pay <?=$users[0]['sum']?></button>
</form>
</body>
</html>

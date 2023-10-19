
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php  
 //session_start();
 require('../config/autoload.php');
include("dbcon.php");

$dao=new DataAccess();
?>
<div class="row">
 <div class="col-md-12">
 <div class="table-responsive">
                                <table border="1"  id="printTable" style="width:100%" >
                                    <thead>
                          <center> star </center>
                           <center> Angamaly </center>
                            <tr>
                             <th style="text-align:left">BillNo.1</th>
                               <th colspan="1" style="text-align:left"></th>
                              <th style="text-align:left" >Date:<?php echo  date("Y/m/d"); ?></th>
                            </tr>
                           <tr>
                              
                          
                        <th>REGISTERED NUMBER</th>
                        <th>EMAIL</th>
                        <th>PAYMENT</th>
                        
</tr>
                      
                                    </thead>
                                    <tbody>
                                   
 <?php
$name=$_SESSION['email'] ;

$sql = "SELECT * FROM vehicledetails WHERE status=1 and email='$name'";
// echo $sql;
$result = $conn->query($sql);


	
	
	
	


if ($result->num_rows > 0) {


 // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
      echo "<tr> <td> "  . $row["regvehicle"]. "</td> <td>"  . $row["email"]. "</td> <td>" . $row["amount"]. "</td>   </tr>";
	  
	    
}
}


 ?>


 



</table>



<?php

$sql11 =" UPDATE vehicledetails SET status=2 WHERE status=1 and email='$name'" ;

if ($conn->query($sql11) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
	 
	
	 }
	 ?>
     <br /><br />

<input type="button" onclick="printData();" value="PRINT"  />

   <a href="Home.php">HOME</a>
</div>
</div>
</div>

</form>





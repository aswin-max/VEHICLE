<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");



$dao=new DataAccess();

   if(isset($_POST["dcmnt"]))
{
     //header('location:adminhome.php');
    // echo "<script>location.href='adminhome.php'</script>";
}

     
       
        ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            <H1><center> VEHICLE DOCUMENT </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                    <th>ID</th>
                    
            
                        <th>LICENSE</th>
                        <th>RC-BOOK</th>
                        <th>INSURANCE</th>
                        <th>POLLUTION</th>
                        <th>FITNESS-PAPER</th>
                        
                       
                     
                       
                       
                     
                      
                    </tr>
<?php
    
    $actions=array(
    
        //'edit'=>array('label'=>'Approve','link'=>'sponser.php','params'=>array('id'=>'spoid'),'attributes'=>array('class'=>'btn btn-success'))
        
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('docid'),
        'actions_td'=>false,
        // 'images'=>array(
        //                'field'=>'img',
        //                'path'=>'../uploads/',
        //                'attributes'=>array('style'=>'width:100px;'))
       
 
         
        
    );

   $condition="d.status=1";
   
   
    $fields=array('docid','license','rc','insrns','polltn','fp');

    $users=$dao->selectAsTable($fields,'dcmnt as d',$condition,null,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form action="" method="POST" enctype="multipart/form-data">




</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

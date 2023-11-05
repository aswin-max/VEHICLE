
<?php include("sidebar.php");
include("dbconn.php");


$dao=new DataAccess();



?>


    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-11">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                    <th scope="col">DATE</th>
              <th scope="col">RC NUMBER</th>
              <th scope="col">LOCATION</th>
              <th scope="col">OWNER</th>
              <th scope="col">IMAGE</th>
                        <th>VERIFY/DELETE</th>  
                    </tr>
<?php
     $actions=array(
        
       'verify'=>array('label'=>'VERIFY','link'=>'verifymiss.php','params'=>array('id'=>'mid'),'attributes'=>array('class'=>'btn btn-success')),
        
        'delete'=>array('label'=>'Delete','link'=>'deletemiss.php','params'=>array('id'=>'mid'),'attributes'=>array('class'=>'btn btn-success'))
        
        );
        $config=array(
        
            'hiddenfields' => array('mid'),
            'images'=>array(
                           'field'=>'pic',
                           'path'=>'../uploads/',
                           'attributes'=>array('style'=>'width:100px;'))
           
           
           
       );

        $join = array(
            'vehicle as v' => array('v.vid=m.vid', 'join'),
            'owner as o' => array('o.owno=m.owno', 'join'),
        );
        $fields = array('mid','date','v.vrno as vrno', 'loc', 'o.owname as owname', 'm.pic');
        $users = $dao->selectAsTable($fields, 'missing as m','m.status=1',$join,$actions,$config);  
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    

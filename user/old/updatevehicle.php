<?php require('../config/autoload.php')?>
<?php include('header.php');
include("dbcon.php");
$dao=new DataAccess();
$file=new FileUpload();

//$name=$_SESSION['email'];
$vid = $_GET['id'];

$elements=array(
       
  "regowner"=>"","owneraddress"=>"","email"=>"",
   "rc"=>"","insrns"=>""
  //  ,"poltn"=>"","fp"=>"","pan"=>"","dob"=>"","addressproof"=>"","tax"=>"","img"=>""

);
    
  $form=new FormAssist($elements,$_POST);
  
  $labels=array('regowner'=>"Registered Owner",'owneraddress'=>"Owner Address",'email'=>"Registered Email",
   'rc'=>"RC-BOOK","insrns"=>"Insurance"
  // ,"poltn"=>"Pollution","fp"=>"Fitness paper","pan"=>"Pan-Card","dob"=>"Date of Birth","addressproof"=>"Address-Proof","tax"=>"Tax","img"=>"Image"

);


  
  
      $rules=array(
        "regowner"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true,),
        "owneraddress"=>array("required"=>true,"minlength"=>3,"alphaspaceonly"=>200,),
        "email"=>array("required"=>true,"minlength"=>3,"maxlength"=>50,),
      "rc"=> array(),
      "insrns"=> array(),
  //    "poltn"=> array("filerequired"=>true),
  //    "fp"=> array("filerequired"=>true),
  //    "pan"=> array("filerequired"=>true),
  //  "dob"=> array("filerequired"=>true),
  //  "addressproof"=> array("filerequired"=>true),
  //  "tax"=> array("filerequired"=>true),
  //  "img"=> array("filerequired"=>true),
      
       
  );
      
  $validator = new FormValidator($rules,$labels);

  if(isset($_POST["btn_update"]))
  {
       if($validator->validate($_POST))
      {
           if($fileName=$file->doUploadRandom($_FILES['rc'],array('.pdf','.docx'),100000,5,'../uploads'))	
           {
             
               $fileName1=$file->doUploadRandom($_FILES['insrns'],array('.pdf','.docx'),100000,5,'../uploads');
               $fileName2=$file->doUploadRandom($_FILES['poltn'],array('.pdf','.docx'),100000,5,'../uploads');
//               $fileName3=$file->doUploadRandom($_FILES['fp'],array('.pdf','.docx'),100000,5,'../uploads');
//               $fileName4=$file->doUploadRandom($_FILES['pan'],array('.pdf','.docx'),100000,5,'../uploads'); 
//               $fileName5=$file->doUploadRandom($_FILES['dob'],array('.pdf','.docx'),100000,5,'../uploads');
//               $fileName6=$file->doUploadRandom($_FILES['addressproof'],array('.pdf','.docx'),100000,5,'../uploads');
//               $fileName7=$file->doUploadRandom($_FILES['tax'],array('.pdf','.docx'),100000,5,'../uploads');
//               $fileName8=$file->doUploadRandom($_FILES['img'],array('.jpg','.png','.jpeg'),100000,1,'../uploads');
// {

  $q10="select * from vehicledetails where vid=".$vid ;
  $info121=$dao->query($q10);
  $a = $info121[0]["regvehicle"];
  $b = $info121[0]["rid"];
  $c = $_POST["regowner"];
  $d = $_POST["owneraddress"];
  $e = $_POST["email"];
  $f = $info121[0]["vehicle"];
  $x = $info121[0]["type"];
  $g = $info121[0]["fuel"];
  $h = $info121[0]["color"];
  $i = $info121[0]["mdate"];
  $j = $info121[0]["taxno"];
  $k = $info121[0]["amount"];
  $l = $info121[0]["regdate"];
  $m = $info121[0]["regvalidityfrom"];
  $n = $info121[0]["regvalidityto"];
   $o = $info121[0]["rc"];
   $p = $info121[0]["insrns"];
  // $q = $info121[0]["poltn"];
  // $r = $info121[0]["fp"];
  // $s = $info121[0]["pan"];
  // $t = $info121[0]["dob"];
  // $u = $info121[0]["addressproof"];
  // $v = $info121[0]["tax"];
  // $w = $info121[0]["img"];
  $z = $info121[0]["status"];
  $status=0;
  $sql = "INSERT INTO vehicledetails(regvehicle,rid,regowner,owneraddress,email,vehicle,type,fuel,color,mdate,taxno,
  amount,regdate,regvalidityfrom,regvalidityto,status)
   VALUES ('$a','$b','$c','$d','$e','$f','$x','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$z')";

echo $sql;
  $conn->query($sql);
 }
}
 }
// }

 else
        {$msg="Registration failed";}
 ?>
 




<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" >
 
  
<div class="row">
                    <div class="col-md-6">				
NAME OF REGISTERED OWNER :

<?= $form->textBox('regowner',array('class'=>'form-control')); ?>
<?= $validator->error('regowner'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
OWNER'S ADDRESS :

<?= $form->textBox('owneraddress',array('class'=>'form-control')); ?>
<?= $validator->error('owneraddress'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
EMAIL ADDRESS :

<?= $form->textBox('email',array('class'=>'form-control')); ?>
<?= $validator->error('email'); ?>

</div>
</div>
 <div class="row">
                   <div class="col-md-6">	
RC BOOK

<?=$form->fileField('rc',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('rc'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">				
INSURANCE

<?= $form->fileField('insrns',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('insrns'); ?></span>

</div>
</div> 
                   
<!-- <div class="row">
                   <div class="col-md-6">
                                       
               
POLLUTION PAPER

<?= $form->fileField('poltn',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('poltn'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
FITNESS PAPER

<?= $form->fileField('fp',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('fp'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">				
PAN-CARD

<?= $form->fileField('pan',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('pan'); ?></span>

</div>
</div>
                   
<div class="row">
                   <div class="col-md-6">
                                       
               
DATE OF BIRTH

<?= $form->fileField('dob',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('dob'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
ADDRESS-PROOF

<?= $form->fileField('addressproof',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('addressproof'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
TAX CERTIFICATE

<?= $form->fileField('tax',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('tax'); ?></span>

</div>
</div>

<div class="row">
                   <div class="col-md-6">
IMAGE

<?= $form->fileField('img',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('img'); ?></span>

</div>
</div> -->

<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>
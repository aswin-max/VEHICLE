<?php

require('../../config/autoload.php'); 

$a=$_SESSION["id"];
$dao=new DataAccess();
$join=array(
    'owner as o'=>array('o.vid=p.vid','join'),
    'epayment as pay'=>array('pay.pid=p.pid','join'),
    'fine as f'=>array('f.fine_id=p.fine_id','join'),
);  $fields=array('o.owname as owname','f.amount','pay.payid as payid','p.pid','sum(f.amount)');

$users=$dao->getDataJoin($fields,'epunish as p','o.owno='.$a.'and p.status=2',$join);
print_r($users);
?>











<html>





    <link rel="stylesheet" type="text/css" href="pay.css">



    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>








<div class="container bg-light d-md-flex align-items-center"> 
    <div class="card box1 shadow-sm p-md-5 p-md-5 p-4"> 
   <div class="fw-bolder mb-4">
  
  <span class="ps-1"><?=$users[0]['owname']?></span>
   </div> 
   <div class="d-flex flex-column"> 

  <div class="d-flex align-items-center justify-content-between text mb-4"> 
 <span>Total</span> 
 <span class="fas fa-rupee-sign">
<span class="ps-1"><?=$users[0]['sum(f.amount)']?></span>
 </span>
  </div> 
  <div class="border-bottom mb-4">

  </div> 
  <div class="d-flex flex-column mb-4"> 
<span class="far fa-file-alt text">
 <span class="ps-2">Invoice ID:</span>
</span> 
 <span class="ps-3"><?=$users[0]['payid']?></span> 
</div> 
<!-- <div class="d-flex flex-column mb-5"> 
 <span class="far fa-calendar-alt text">
<span class="ps-2">Next payment:</span>
 </span> 
<span class="ps-3">22 july,2018</span> 
 </div>  -->
 <div class="d-flex align-items-center justify-content-between text mt-5"> 
<div class="d-flex flex-column text">
<span>Customer Support:</span> 
<span>online chat 24/7</span> 
    </div>
<div class="btn btn-primary rounded-circle">
   <span class="fas fa-comment-alt"></span>
    </div> 
</div> 
 </div> 
</div> 
<div class="card box2 shadow-sm"> 
 <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> 
<span class="h5 fw-bold m-0">Payment methods</span> 
<div class="btn btn-primary bar">
    <span class="fas fa-bars"></span>
</div> 
 </div>
  <ul class="nav nav-tabs mb-3 px-md-4 px-2">
 <li class="nav-item"> 
    <a class="nav-link px-2 active" aria-current="page" href="#">Credit Card</a> 
</li> 
<li class="nav-item"> 
    <a class="nav-link px-2" href="#">Mobile Payment</a> 
</li>
 <li class="nav-item ms-auto">
<a class="nav-link px-2" href="#">+ More</a>
</li> 
    </ul> <div class="px-md-5 px-4 mb-4 d-flex align-items-center">

   
   
</div> <form action=""> 
  <div class="row"> <div class="col-12"> 
 <div class="d-flex flex-column px-md-5 px-4 mb-4"> 
<span>Credit Card</span> 
<div class="inputWithIcon"> 
    <input class="form-control" type="text" value="5136 1845 5468 3894"> 
    <span class=""> 
<img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt=""></span>
</div> 
    </div> 
</div> 
<div class="col-md-6"> 
    <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4"> 
<span>Expiration<span class="ps-1">Date</span></span> 
<div class="inputWithIcon">
<input type="text" class="form-control" value="05/20"> <span class="fas fa-calendar-alt"></span>
</div> 
    </div>
 </div>
  <div class="col-md-6">
<div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4">
    <span>Code CVV</span>
<div class="inputWithIcon">
   <input type="password" class="form-control" value="123"> 
   <span class="fas fa-lock"></span> 
  </div>
    </div> 
   </div> 
   <div class="col-12">
   <div class="d-flex flex-column px-md-5 px-4 mb-4">
   <span>Name</span> 
   <div class="inputWithIcon">
  <input class="form-control text-uppercase" type="text" value="valdimir berezovkiy"> 
  <span class="far fa-user"></span> 
 </div> 
  </div> 
  </div> 
  <div class="col-12 px-md-5 px-4 mt-3">
   <div class="btn btn-primary w-100">Pay <?=$users[0]['sum(f.amount)']?>

   </div>
  </div>
   </div> 
  </form> 
   </div> 
    </div>
    </html>
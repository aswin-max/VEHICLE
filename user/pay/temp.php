<!DOCTYPE html>

<html lang="en">

<head>
    <?php include("dbcon.php");
  require("../config/autoload.php");
  $retrievedArray = unserialize($_SESSION['myArray']);
  // print_r($retrievedArray);
  ?>
    <script type="text/javascript">
    function validations() {
        var name = document.getElementById("Cname");
        if (name.value == "") {
            alert("Enter Card Holder Name...");
            name.focus();
            return false;
        }


        var name = document.getElementById("date");
        if (name.value == "") {
            alert("Enter Card Month");
            name.focus();
            return false;
        }

        var name = document.getElementById("Cyy");
        if (name.value == "") {
            alert("Enter Card Year");
            name.focus();
            return false;
        }

        var name = document.getElementById("verification");
        if (name.value == "") {
            alert("Enter Card CVV / CVC");
            name.focus();
            return false;
        }

        var name = document.getElementById("cardnumber");
        if (name.value == "") {
            alert("Enter Card Number");
            name.focus();
            return false;
        }

        var name = document.getElementById("add");
        if (name.value == "") {
            alert("Enter Delivery Address");
            name.focus();
            return false;
        }

    }
    </script>

    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="payment/style.css">
    <meta name="robots" content="noindex,follow" />
</head>

<body>
    <?php
  //session_start();
  

  //  print_r($retrievedArray);
//   echo var_dump($retrievedArray);
  $b = 0;
  foreach($retrievedArray as $row)
    $b += $row[1];
  $amt = $b;
  $name = $_SESSION['email'];

  ?>

    <?php
  if(isset($_POST["next"])) {
    $email = $_SESSION['email'];
    $deliveryAddress = $_POST['add'];

    $sql = "UPDATE cart SET address = '$deliveryAddress' WHERE uemail = '$email'";

    $test = $conn->query($sql);



    $q1 = "select * from cart where status=1 and uemail='".$name."'";
    $result1 = $conn->query($q1);
    $row3 = array();
    while($row2 = mysqli_fetch_assoc($result1)) {
      $row3[] = $row2;
    }
    $datenow = new DateTime();
    $datenow = $datenow->format('Y-m-d H:i:s');
    $sql11 = " UPDATE cart SET status=2 WHERE status=1 and uemail='$name' and cart_id IN(";

    foreach($retrievedArray as $row) {

      $cart_id = $row[0];
      $amount = $row[1];
// print_r($row);
      $sql12 = "INSERT INTO booking (amount,cart_id,btime) VALUES ('$amount' ,'$cart_id','$datenow');";
      $conn->query($sql12);
    //   echo $datenow;
    $date = explode(' ', $datenow);

    $sql11 .= " '$cart_id', ";

    
    }
    $sql11.="-1);";

echo $sql11;
    if($conn->query($sql11))
    
    // $sqll = " INSERT INTO booking(amount,cart_id,btime,status) VALUES('$amount',$cart_id,'$datenow',2";
    {
      echo "<script> alert('Payment Sucessfully');</script> ";




      //  echo"<script> location.replace('invoicenew.php'); </script>";
      echo "<script> location.replace('invoice.php'); </script>";

    }
  }


  ?>
    <form action="" method="POST" onSubmit="return validations();" enctype="multipart/form-data">
        <div class="checkout-panel">
            <div class="panel-body">
                <h2 class="title">Checkout</h2>

                <div class="progress-bar">
                    <div class="step active"></div>
                    <div class="step active"></div>
                    <div class="step"></div>
                    <div class="step"></div>
                </div>
                <?php
        //session_start();
        $name = $_SESSION['email'];
        echo $name;
        ?>


                <div class="payment-method">
                    <label for="card" class="method card">


                        <div class="card-logos">
                            <img src="payment/img/visa_logo.png" />
                            <img src="payment/img/mastercard_logo.png" />
                        </div>

                        <div class="radio-input">
                            <input id="card" type="radio" name="payment">
                            Pay Rs.
                            <?php echo $amt; ?> with credit card
                        </div>
                    </label>

                    <label for="paypal" class="method paypal">
                        <img src="payment/img/paypal_logo.png" />
                        <div class="radio-input">
                            <input id="paypal" type="radio" name="payment">
                            Pay Rs.
                            <?php echo $amt; ?> with pay pal
                        </div>
                    </label>
                </div>

                <div class="input-fields">
                    <div class="column-1">
                        <label for="cardholder">Cardholder's Name</label>
                        <input type="text" name="Cname" id="Cname" onkeypress="return /[a-z]/i.test(event.key)" />

                        <div class="small-inputs">
                            <div>
                                <label for="date">Valid thru</label>
                                <input type="text" id="date" name="Cmm" placeholder="MM "
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                    maxlength="2" minlength="1" id="date" name="Cmm" placeholder="MM " />
                                <input type="text" id="Cyy" placeholder="YY"
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                    maxlength="4" minlength="4" id="date" name="Cmm" placeholder="MM " />

                            </div>

                            <div>
                                <label for="verification">CVV / CVC *</label>
                                <input type="password" name="cvv" id="verification"
                                    onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                    minlength="3" maxlength="3" name="cvv" id="verification" />
                            </div>
                        </div>

                    </div>
                    <div class="column-2">
                        <label for="cardnumber">Card Number</label>
                        <input type="password" name="Cnum" id="cardnumber"
                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                            minlength="16" maxlength="16" name="Cnum" id="cardnumber" />

                        <span class="info">* CVV or CVC is the card security code, unique three digits number on the
                            back of your card separate from its number.</span>

                        <label for="address">Delivery Address</label>
                        <input type="text" name="add" placeholder=" max 32 characters"
                        maxlength="32" id="add" />

                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <button class="btn back-btn">Back</button>
                <button type="submit" class="btn next-btn" name="next">Next Step</button>

            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="payment/script.js"></script>

</body>

</html>

<?php
include 'config.php';
$admin = new Admin();

if(!isset($_SESSION['u_id'])){
    echo "<script>alert('please login');window.location.href='login.php';</script>";
}
$uid = $_SESSION['u_id'];


    $bid = $_GET['bid'];
  
    $stmt = $admin->ret("SELECT * FROM `booking` WHERE `b_id` = '$bid' ");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f3a6c5;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-form {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
        }

        .card-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .payment-options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .payment-options input[type="radio"] {
            display: none;
        }

        .payment-options label {
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            background-color: #e9ecef;
        }

        .payment-options input[type="radio"]:checked + label {
            background-color: #007bff;
            color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body style="background-color:#e58763;">

<div class="card-container">
    <div class="card-form">
        <h2>Payment Form</h2>
        <!-- Payment Options -->
        <a href="status.php"><i class="fas fa-angles-left"></i></a></br></br>
        <div class="payment-options">
            <input type="radio" name="paymentOption" id="cardPayment" checked>
            <label for="cardPayment">Card Payment</label>
            <input type="radio" name="paymentOption" id="upiPayment">
            <label for="upiPayment">UPI Payment</label>
        </div>
        <h3>₹.<?php echo $row['t_price'] ; ?></h3>
        <!-- Card Payment Form -->
        <form id="cardForm" method="POST" action="controller/records.php">

        <input type="hidden" name="tprice" value="<?php echo $row['t_price'] ; ?>" >
        <input type="hidden" name="uid" value="<?php echo $uid ; ?>" >
        <input type="hidden" name="boid" value="<?php echo $bid ; ?>" >
        <!-- <input type="hidden" name="vid" value="<?php echo $row['v_id']  ; ?>" >
        <input type="hidden" name="bid" value="<?php echo $row['b_id'] ; ?>" > -->

        <input type="hidden" name="pay" value="Card" >



            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter Card Number" required>
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM / YYYY" required>
            </div>
            <div class="form-group">
                <label for="cvc">CVV Number</label>
                <input type="password" class="form-control" id="cvc" name="cvc" placeholder="CVV" maxlength="3" required>
            </div>
            <div class="form-group">
                <label for="cardholderName">Cardholder Name</label>
                <input type="text" class="form-control" id="cardholderName" name="cardholderName" placeholder="Cardholder Name" required>
            </div>
            <!-- Hidden Inputs for Amount, BID, Type, and Vendor -->
         
            <!-- Submit Button -->
            <button type="submit" name="payment" class="btn btn-primary">Pay Now</button>
        </form>
        <!-- UPI Payment Form -->
        <form id="upiForm" style="display: none;" method="POST" action="controller/records.php">
           
        
        <input type="hidden" name="tprice" value="<?php echo $row['t_price'] ; ?>" >
        <input type="hidden" name="uid" value="<?php echo $uid ; ?>" >
        <input type="hidden" name="boid" value="<?php echo $bid ; ?>" >
        <!-- <input type="hidden" name="vid" value="<?php echo $row['v_id']  ; ?>" >
        <input type="hidden" name="bid" value="<?php echo $row['b_id'] ; ?>" > -->

        <input type="hidden" name="pay" value="upi" >

        <div class="form-group">
               <img src="qrcode.jpg" width="100px" height="100px" />
            </div>
        <div class="form-group">
                <label for="transactionNumber">Transaction Number</label>
                <input type="text" class="form-control" id="transactionNumber" name="transactionNumber" placeholder="Enter Transaction Number" required>
            </div>
          
            <!-- Submit Button -->
            <button type="submit" name="payment" class="btn btn-primary">Pay Now</button>
        </form>
    </div>
</div>


<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(function() {
        // Handle payment option change
        $(".payment-options input[name='paymentOption']").on("change", function() {
            var selectedOption = $(this).attr("id");
            if (selectedOption === "cardPayment") {
                $("#cardForm").show();
                $("#upiForm").hide();
            } else if (selectedOption === "upiPayment") {
                $("#cardForm").hide();
                $("#upiForm").show();
            }
        });

        // Validation and form submission...
    });
</script>
</body>
</html>

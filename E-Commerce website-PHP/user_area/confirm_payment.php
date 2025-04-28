<?php=

include('../includes/connect.php');
  
  session_start();

  if(isset($_GET['order_id'])){
      $order_id=$_GET['order_id'];
      echo $order_id;

      //show data on confirm payment form
      $select_data="select * from `user_orders` where order_id=$order_id";

      $select_data;
      $result=mysqli_query($con, $select_data);
      $row_fetch=mysqli_fetch_assoc($result);
      $row_fetch;
      $invoice_number=$row_fetch['invoice_number'];
      $amount_due=$row_fetch['amount_due'];
      echo $invoice_number;
      

  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body class="bg-secondary">
   
<div class="container my-5">
<h1 class="text-center text-light">Confirm payment</h1>


    <form action="" method="post">
        <div class="form-outline my-4 text-center w-50 m-auto" >
            <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">

        </div>

        <div class="form-outline my-4 text-center w-50 m-auto" >
            <label for="" class="text-light">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">

        </div>

        
        <div class="form-outline my-4 text-center w-50 m-auto" >

         <select name="payment_mode" class="form-select w-50 m-auto">
            <option value="">Select Payment Mode</option>
            <option value="">UPI</option>
            <option value="">Netbanking</option>
            <option value="">Paypal</option>
            <option value="">Cash on delivery</option>
            <option value="">Pay Offline</option>
         </select>
        </div>

        <div class="form-outline my-4 text-center w-50 m-auto" >
            <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
        </div>
    </form>
</div>


    
</body>
</html>
    


?>
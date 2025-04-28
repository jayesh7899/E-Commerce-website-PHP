<?php 

    include('../includes/connect.php'); 

    include('../function/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .payment_img{
            width: 50%;
            margin:auto;
            display:block;
        }
    </style>

</head>
<body>
    <!-- PHP Code-->

    <?php

        $user_ip=getIPAddress();
        $get_user="select * from `user_table` where user_ip='$user_ip'";
        $result=mysqli_query($con, $get_user);
        $run_query=mysqli_fetch_array($result);

        $user_id=$run_query['user_id'];

    ?>

        <div class="container">
            <h2 class="text-center text-info">Payment Options</h2>


            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-md-6">

                    <a href="https://www.paypal.com" target="_blank"><img src="../images/paymentimage.jpg" alt="" class="payment_img"></a>

                </div>

                <div class="col-md-6">

                    
                    <a href="order.php?user_id=<?php echo $user_id?>" target=""><h2 class="text-center">Pay offline</h2></a>
           
                </div>
            </div>

        </div>
    <h1>Payment</h1>
</body>
</html>
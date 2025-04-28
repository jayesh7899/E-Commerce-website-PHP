<?php
    include('includes/connect.php');
    include('function/common_function.php');
    session_start();
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width:80px;
            height:80px;
            object-fit:contain;
            
            
        }
    </style>


</head>
<body>
  

    <!--NAVBAR HERE-->
    <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="./images/logoo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="display_all.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i><sup><?php cart_item();?></sup></a>
                </li>
                
                
            </ul>
            
            </div>
        </div>
        </nav>
        <?php

            //calling  cart function here
            cart();
        ?>

        <!--Second  child HERE-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

        <ul class="navbar-nav me-auto">
           
            <?php

                //for print user name with welcome
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";

            }else{
                echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>";
            }

            //for login and logout

                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                        </li>";

                }else{
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
                        </li>";
                }

            ?>
        </ul>

        </nav>

        <!--third  child HERE-->

        <div class="bg-light">
            <h3 class="text-center">
                Hidden Store
            </h3>

            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!--forth child table-->

        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    <!--<thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
    -->
                <tbody>
                    <!--php code to display dynamic data-->


                    <?php 

                    //global $con;

                    $ip= getIPAddress();

                    $cart_query="select * from `cart_details` where ip_address='$ip'";

                    $result=mysqli_query($con,$cart_query);
                    $total_price=0;

                    $result_count=mysqli_num_rows($result);
                    if($result_count>0)
                    {
                        echo" <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";

                    

                    while($row=mysqli_fetch_array($result))
                    {
                        $product_id=$row['product_id'];

                        $select_products="select * from `products` where product_id='$product_id'";

                        $result_products=mysqli_query($con,$select_products);

                        while($row_product_price=mysqli_fetch_array($result_products))
                        {
                            $product_price=array($row_product_price['product_price']);

                            $price_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'];
                            $product_image1=$row_product_price['product_image1'];
                           

                            $product_values=array_sum($product_price);

                            $total_price+=$product_values;

                            //close this while loop after tr tag



                        //}

                    //}
                    ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                        <td><input type="text" id="" name="quantity" class="form-input w-50"></td>
                        
                        <?php 
                            global $con; 

                            $ip= getIPAddress();


                            if(isset($_POST['update_cart']))
                            {
                                $quantities=$_POST['quantity'];
                                


                                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                              
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                
                                $total_price=$total_price*$quantities;
                                
                            
                            }

                        ?>

                        <td><?php echo $price_table ?>/-</td>
                        <td>
                            <input type="checkbox" name="removeitem[]" value="<?php  echo $product_id ?>"></td>
                        <td>
                            
                        <!--
                            <button class="bg-info px-3 py-2 border-0 mx-3">Update</button>
                        <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button>
                            -->

                        <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                        
                        <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                        
                        
                        

                        </td>
                       
                    </tr>

                    <?php      }}}     
                        
                        else {
                            
                            
                            echo"<h2 class='text-center text-danger'>Cart is Empty...</h2> ";
                        }
                    


                    ?>
                </tbody>
                </table>

                

                <!--Sub section-->

                <div class="d-flex mb-5">
                    <?php
                    $ip= getIPAddress();

                    $cart_query="select * from `cart_details` where ip_address='$ip'";

                    $result=mysqli_query($con,$cart_query);
                    //$total_price=0;

                    $result_count=mysqli_num_rows($result);
                    if($result_count>0)
                    {

                        echo"
                        <h4 class='px-3'>Subtotal : <strong class='text-info'>$total_price/-</strong></h4>

                        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_Shopping'>
                    
                    <button class='bg-secondary px-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>CheckOut</a></button>
                
                    ";


                    }
                    else {
                        echo"
                        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='Continue_Shopping'>";
                    }
                    if(isset($_POST['Continue_Shopping']))
                    {
                        echo "<script>window.open('index.php','_selt')</script>";
                    }
                        ?>
                    <!--<h4 class="px-3">Subtotal : <strong class="text-info"><?php echo $total_price ?>/-</strong></h4>

                    <a href="index.php">
                        <button class="bg-info px-3 py-2 border-0 mx-3">Continue Shopping</button>
                    </a>
                    
                    <a href="#"><button class="bg-secondary px-3 py-2 border-0 text-light">CheckOut</button></a>
                
                --> 

                </div>
            </div>
        </div>

        </form>

        <!--function to remove item--->
        <?php


        function remove_cart_item1()
        {
            global $con;

            if(isset($_POST['remove_cart']))
            {
                foreach($_POST['removeitem'] as $remove_id)
                {
                    

                    $delete_query="Delete from `cart_details` where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);

                    if($run_delete)
                    {
                        echo "<script>window.open('index.php','_selt')</script>";
                        
                    }
                }


                
            }
            
        }
        echo $remove_item=remove_cart_item1();

        ?>

        

          <!--include footer-->
          <?php
            include("./includes/footer.php");
            ?>
</div>



    <!--SCRIPTS HERE-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    
</body>
</html>
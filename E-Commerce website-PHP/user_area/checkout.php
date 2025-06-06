<?php
    include('../includes/connect.php');
    //include('function/common_function.php');
    session_start();
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <style>
        .logo{
            width: 7%;
            height:7%;
        }
    </style>

</head>
<body>
  

    <!--NAVBAR HERE-->
    <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/logoo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../display_all.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_registration.php">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
                </li>
              
                
            </ul>
            <form class="d-flex" role="search" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
                <!--<button class="btn btn-outline-light" type="submit">Search</button>-->
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">

            </form>
            </div>
        </div>
        </nav>
       

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
                            <a class='nav-link' href='./user_login.php'>Login</a>
                        </li>";

                }else{
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_logout.php'>Logout</a>
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

        <!--Fourth  child HERE  cart images-->

        <div class="row px-2">
            <div class="col-md-12">
                <!--products HERE-->

                <div class="row">
                    <?php
                        if(!isset($_SESSION['username']))
                        {
                            include('user_login.php');
                        }
                        else{
                            include('payment.php');
                        }

                        
                    ?>
                   
                    
                
                <!--fetching products here -->

                </div>
            </div>
    

          <!--include footer-->
          <?php
            include("../includes/footer.php");
            ?>
    </div>



    <!--SCRIPTS HERE-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    
</body>
</html>
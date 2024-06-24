<!-- connect file -->
<?php 
    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    


    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>


        body{
            overflow-x:hidden;
            
        }
        .navbar-nav .nav-link {
        transition: color 0.3s ease;
        font-size: 18px;
        font-weight:bold[500];
        color:white;
        font-family: 'sans-serif';
        }

        .navbar-nav .nav-link:hover {
        color: #201658; /* Change the color to your desired hover color */
        font-size:20px;
        }
        .custom-bg {
      background-color:  #ff66a3;
    }
    .custom-h3{
        color:#ada397;
        font-size:40px;

    }
    .custom-p{
        color:#034f84;

    }
    .custom-nav2{
        background-color:#5b9aa0;
    }
    .logo {
  width: 15%;
  height: 15%;
  /* border-radius:10px; */
}
.navbar-nav{
    gap:10px;
    
}
.header{
    min-height: 90vh;
    width: 100%;
    background-image: linear-gradient(#F8EDFF,rgba(16, 17, 17, 0.616)),url(./images/4.png);
     background-position: center;
    background-size: cover;
    position: relative;


    

}
.text-box{
    width: 90%;
    color: #fff;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    
    

}
.text-box h1{
    font-size: 100px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color: #132043;
    font-family: 'sans-serif';
}
.text-box h3{
    margin: 15px 120px 40px;
    font-size: 30px;
    color: #132043;
    font-family: sans-serif;
    font-family: 'sans-serif';
}
.text-box a{
    display: inline; 
    text-decoration: none; 
    color: #fff; 
    border: 1px solid #fff; 
    padding: 12px 34px; 
    font-size: 16px; 
    background: transparent; 
    position: relative; 
    cursor: pointer;
    background:#1F4172;
}
.text-box a:hover{ 
    border: 1px solid #e98d3696; 
    background: #e98d36bb; 
    transition: 0.6s; 
 
}
/* an s */
@keyframes popup {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .text-box h1 {
            animation: popup 2s ease-out;
        }

@keyframes fadein {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .text-box h3 {
            animation: fadein 3s ease-in-out;
        }
    
        @keyframes fadein {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .text-box a {
            animation: fadein 3s ease-in-out;
        }



/* an e */


    </style>

    
</head>
<body>

    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light custom-bg">
                <div class="container-fluid">
                    <!-- logo -->
                    <img src="./images/Logo4.png" alt="" class="logo"> 

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                        </li>


                        <?php
                            if (isset($_SESSION['username'])) {
                                echo "
                                <li class='nav-item'>
                                <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                                </li>
                                
                                ";
                            }else{
                                echo "
                                <li class='nav-item'>
                                <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                                </li>
                                
                                ";
                                

                            }

                        ?>

                        <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:Rs.<?php total_cart_price(); ?></a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                    </div>
                </div>
        </nav>
        <!-- calling cart function -->
        <?php
            cart();
        ?>

        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark custom-nav2">
            <ul class="navbar-nav me-auto">



                        <?php

                            if (!isset($_SESSION['username'])) {
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='#'>Welcome Guest</a>
                                    </li>
                                
                                ";
                            }else{
                                echo "
                                <li class='nav-item'>
                                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                            </li>
                                ";
                            }

                            if (!isset($_SESSION['username'])) {
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                                    </li>";
                            }else{
                                echo "
                                <li class='nav-item'>
                                <a class='nav-link' href='./users_area/logout.php'>LogOut</a>
                            </li>";
                            }
                        
                        ?>

            </ul>
        </nav>

        <section class="header">
                    <!-- Third child -->

            <div class="text-box">
                <h1>PINKY PETALS</h1>
                <br>
                <h3>"Welcome to our enchanting flower haven, where beauty blossoms with every click. Explore a kaleidoscope of vibrant blooms, curated to express every sentiment."</h3>
                
                <a href="display_all.php">EXPLORE PRODUCTS
                </a>

            </div>


        </section>
        <br>



        <!-- Fourth child -->
        <div class="row">
            <div class="col-md-10">
                <!-- products -->
                <div class="row px-1">

                <!-- fetching products -->
                <?php
                    // calling function
                    // getproducts();
                    get_unique_categories();
                    get_unique_brands();
                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip; 

                
                ?>

                    <!-- row end -->
                </div>
                <!-- column end -->
            </div>

            <!-- Side nav -->
            <!-- <div class="col-md-2 bg-secondary p-0"> -->
                
                <!-- brands to be displayed -->
                <!-- <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Items</h4></a>
                    </li>
                    <?php
                       // getbrands();

                    ?>
                    
                </ul> -->

                <!-- categories to be displayed -->
                <!-- <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                        // getcategories();
                    ?>


                </ul>
                
            </div>
        </div> -->


        <!-- Last child -->
        <!-- include footer -->
        <?php
            include("./includes/footer.php");
        ?>

    </div>






    
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
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
        font-family: 'sans-serif';

    }
    .custom-p{
        color:#034f84;
        font-family: 'sans-serif';

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
.card-img-top {
  width: 100%;
  height: 300px;
  object-fit: contain;
}




    </style>
    
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light custom-bg">
                <div class="container-fluid">
                    <!-- logo -->
                    <img src="./images/logo4.png" alt="" class="logo"> 

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
                        <li class="nav-item">
                        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
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
                    <form class="d-flex" role="search" action="" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        

                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                    </div>
                </div>
        </nav>

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

        <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center custom-h3">PINKY PETALS</h3>
            <p class="text-center custom-p">"Welcome to our enchanting flower haven, where beauty blossoms with every click. Explore a kaleidoscope of vibrant blooms, curated to express every sentiment."</p>
        </div>

        <!-- Fourth child -->
        <div class="row">
            <div class="col-md-10">
                <!-- products -->
                <div class="row px-1">

                <!-- fetchin products -->
                <?php
                    // calling function
                    search_product();
                    get_unique_categories();
                    get_unique_brands();

                
                ?>

                    <!-- row end -->
                </div>
                <!-- column end -->
            </div>

            <!-- Side nav -->
            <div class="col-md-2 bg-secondary p-0">
                
                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>
                    <?php
                        getbrands();

                    ?>
                    
                </ul>

                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                        getcategories();
                    ?>


                </ul>
                
            </div>
        </div>


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
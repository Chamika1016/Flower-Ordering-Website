<!-- connect file -->
<?php 
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'];?></title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .profile_img {
  width: 90%;
  margin:auto;
  display:block;
  /* height: 100%; */
  object-fit:contain;
}
.edit_img{
    width:100px;
    height:100px;
    object-fit:contain;
}
.custom-bg {
      background-color:  #ff66a3;
    }
    .custom-h3{
        color:#ada397;
        font-family: 'sans-serif';

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
        font-size: 20px;
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
    </style>

    
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light custom-bg">
                <div class="container-fluid">
                    <!-- logo -->
                    <img src="../images/logo4.png" alt="" class="logo"> 

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Total Price:Rs.<?php total_cart_price(); ?></a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
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
                                <a class='nav-link' href='../index.php'>LogOut</a>
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
        <br><br>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item ">
                            <p class="bg-info text-light py-3 px-3">Your Profile</p>
                    </li>


                    <?php
                        $username=$_SESSION['username'];
                        $user_image="select * from `user_table` where user_name='$username'";
                        $user_image=mysqli_query($con,$user_image);
                        $row_image=mysqli_fetch_array($user_image);
                        $user_image=$row_image['user_image'];
                        echo "
                        <li class='nav-item'>
                        <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
                       </li>

                        ";
                    ?>


                    <li class="nav-item ">
                            <a class="nav-link text-light "  href="profile.php">Pending Orders</a>
                    </li>
                    <li class="nav-item ">
                            <a class="nav-link text-light "  href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item ">
                            <a class="nav-link text-light "  href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item ">
                            <a class="nav-link text-light "  href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item ">
                            <a class="nav-link text-light "  href="">Logout</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details();

                    if (isset($_GET['edit_account'])) {
                        include('edit_account.php');
                    }
                    if (isset($_GET['my_orders'])) {
                        include('user_orders.php');
                    }
                    if (isset($_GET['delete_account'])) {
                        include('delete_account.php');
                    }
                ?>
            </div>
        </div>

        


        <!-- Last child -->
        <!-- include footer -->
        <?php
            include("../includes/footer.php");
        ?>

    </div>






    
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
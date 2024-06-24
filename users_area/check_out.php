<!-- connect file -->
<?php 
    include('../includes/connect.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website-Checkout page</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .logo{
            width: 15%;
            height:15%
        }
        body{
            overflow-x:hidden;
        }
        .custom-bg {
      background-color:  #ff66a3;
    }
    .custom-nav2{
        background-color:#5b9aa0;
    }

    .navbar-nav .nav-link {
        transition: color 0.3s ease;
        font-size:18px;
        font-weight:bold[500];
        color:white;
        font-family: 'sans-serif';
}

        .navbar-nav .nav-link:hover {
        color: #201658; /* Change the color to your desired hover color */
        font-size:20px;
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
                        <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact</a>
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
                        echo "<li class='nav-item'>
                            <a href='./user_login.php'>Login</a>
                        </li>";
                    }else{
                        echo "<li class='nav-item'>
                            <a href='logout.php'>Logout</a>
                        </li>";

                    }
                ?>


            </ul>
        </nav>

        <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center">My Store</h3>
            <p class="text-center">Communications is at the herat of e-commerce and community</p>
        </div>

        <!-- Fourth child -->
        <div class="row px-1">
            <div class="col-md-12">
                <!-- products -->
                <div class="row">
                    <?php 
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');


                    }else{
                        include('payment.php');
                    }
                    ?>

                </div>
                <!-- column end -->
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
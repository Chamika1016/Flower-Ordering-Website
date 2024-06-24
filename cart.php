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
    <title>E-Commerce Website-Cart Details</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_image {
            width: 80px;
            height: 80px;
            object-fit: contain;
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


                    </ul>
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

        <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center custom-h3">PINKY PETALS</h3>
            <p class="text-center custom-p">"Welcome to our enchanting flower haven, where beauty blossoms with every click. Explore a kaleidoscope of vibrant blooms, curated to express every sentiment."</p>
        </div>
        <br><br>

        <!-- fourth child-table -->

        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">

                  

                        <!-- php code to display dynamic data -->
                        <?php
                        
                        
                        $get_ip_address = getIPAddress();
                        $total_price=0;
                        $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if ($result_count>0) {

                            echo "
                            <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
                            
                        
                        while ($row=mysqli_fetch_array($result)) {
                            $product_id=$row['product_id'];
                            $select_products="select * from `products` where product_id='$product_id'";
                            $result_products=mysqli_query($con,$select_products);
                
                            while ($row_product_price=mysqli_fetch_array($result_products)) {
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);
                                $total_price+=$product_values;
                
                

                        ?>
                        <tr>
                            <td><?php echo $product_title?></td>
                            <td><img src="./images/<?php echo $product_image1?>" alt="" class="cart_image"></td>
                            <td>
                                <input type="text" name="qty" id="" class="form-input w-50">
                            </td>

                                <?php

                                     $get_ip_address = getIPAddress();
                                     if (isset($_POST['update_cart'])) {
                                        $quantities=$_POST['qty'];
                                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                                         $result_products_quantity=mysqli_query($con,$update_cart);
                                         $total_price=$total_price * $quantities;
                                     }
                                
                                 ?>
                            
                            <td>Rs.<?php echo $price_table?>/-</td>
                            <td>
                                <input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>">
                            </td>
                            <td>
                               <!-- <button class="bg-info px-3 py-2 border-0 mx-3" >Update</button> -->
                               <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                               <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                               <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                }
                else{
                    echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";
                }
                        
                        ?>
                    </tbody>
                </table>
                
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <?php
                        $get_ip_address = getIPAddress();
                        
                        $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if ($result_count>0) {
                            echo "
                            <h4 class='px-3'>Sub Total:<strong class='text-info'>Rs.$total_price/-</strong></h4>
                            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                            
                                <button class='bg-secondary px-3 py-2 border-0 '><a href='./users_area/check_out.php' class='text-light text-decoration-none' >Check Out</button>
                            
                            ";
                        }else{
                            echo "
                            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                            ";
                        }

                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('display_all.php','_self')</script>";
                        }
                    ?>
                    

                </div>
            </div>
        </div>
        </form>

        <!-- function to remove items -->
        <?php
            function remove_cart_item(){
                global $con;
                if (isset($_POST['remove_cart'])) {
                    foreach ($_POST['removeitem'] as $remove_id) {
                        echo $remove_id;
                        $delete_query="delete from `cart_details` where product_id=$remove_id";
                        $run_delete=mysqli_query($con,$delete_query);
                        if ($run_delete) {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item=remove_cart_item();
        
        ?>

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
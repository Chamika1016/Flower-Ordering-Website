<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
            <h2 class="text-center mb-5 text-muted">Admin Login</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-xl-5 ">
                    <img src="../images/admin_register.jpg" alt="Admin Registration" class="img-fluid">
                </div>
                <div class="col-lg-6 col-xl-4">
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter your username here:" required="required" class="form-control">
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your Password here:" required="required" class="form-control">
                        </div>
                        <div>
                            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                            <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    
</body>
</html>
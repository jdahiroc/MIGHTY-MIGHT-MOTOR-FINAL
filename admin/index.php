<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tab Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />
    <!-- CSS-->
    <link rel="stylesheet" href="../admin/adminstyles.css">

    <!--BOOTSTRAP LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="overflow-x-hidden">
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first -->
        <nav class="nav nav-bar navbar-expand-lg navbar-light">
            <div class="container-fluid justify-content-center">
                <img src="../img/logo.jpg" alt="logo" class="nav-logo">
        </nav>
        <!-- second -->
        <div class="bg-light">
            <h3 class="text-center p-2">ADMIN DASHBOARD</h3>
        </div>
        <!-- third -->
        <div class="row">
            <div class="col-md-12 p-1">
                <div class="button text-center">
                    <button><a href="/MIGHTY-MIIGHT-MOTOR/admin/index.php?create_user"
                            class="nav-link px-3 text-decoration-none">Add
                            User</a></button>
                    <button><a href="/MIGHTY-MIIGHT-MOTOR/admin/index.php?user_manage"
                            class="nav-link px-3 text-decoration-none">User
                            Management</a></button>
                    <button><a href="/MIGHTY-MIIGHT-MOTOR/admin/insert_product.php?add_product"
                            class="nav-link px-3 text-decoration-none">Add Product</a></button>
                    <button><a href="/MIGHTY-MIIGHT-MOTOR/admin/index.php?product_manage"
                            class="nav-link px-3 text-decoration-none">Product Management</a></button>
                    <button><a href="../admin/loginuser.php"
                            class="logout nav-link bg-danger p-1 px-3">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- fourth -->
        <div class="container overflow-x-auto m-auto">
            <?php
            if (isset($_GET['create_user'])) {
                include('createuser.php');
            }
            if (isset($_GET['user_manage'])) {
                include('usermanagement.php');
            }
            if (isset($_GET['add_product'])) {
                include('insert_product.php');
            }
            if (isset($_GET['product_manage'])) {
                include('ProductInterface.php');
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>
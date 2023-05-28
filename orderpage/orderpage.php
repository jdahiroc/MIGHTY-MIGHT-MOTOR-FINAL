<?php
require_once('../admin/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mighty Might Motor</title>

    <!-- CSS-->
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/orderpage/orderpage.css">

    <!--BOOTSTRAP LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Icons link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- GOOGLE FONT LINK -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand justify-content-center" href="/MIGHTY-MIIGHT-MOTOR/index.html"><img
                        class="nav-logo" src="/MIGHTY-MIIGHT-MOTOR/img/logo.jpg" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cart <img style="width:20px; height:20px;"
                                    src="/MIGHTY-MIIGHT-MOTOR/img/icons/shopping-cart.png" alt="cart-shopping"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- 2nd Child -->
        <div class="bg-light">
            <h3 class="h3 text-center p-3">MIGHTY MIGHT MOTOR</h3>
        </div>

        <!-- 3rd Child -->
        <div class="row justify-content-center" id="home">
            <div class="col-md-10">
                <div class="row">
                    <!-- fetch data to display products from database -->
                    <?php
                    $query = "SELECT * FROM `product`";
                    $result_query = mysqli_query($conn, $query);
                    // $row = mysqli_fetch_assoc($result_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $item_name = $row['item_name'];
                        $item_description = $row['item_description'];
                        $item_image = $row['item_image'];
                        $item_price = $row['item_price'];

                        // display item card dynamic datas
                        echo "<div class='col-md-4 mt-4 mb-5'>
                            <div class='card' style='width: 18rem;'>
                                <img src='/MIGHTY-MIIGHT-MOTOR/admin/uploaded_product_images/$item_image' class='card-img-top' alt='#001'>
                                <div class='card-body'>
                                    <h4 style='color:#E38B29; font-family: 'Poppins', sans serif;>$item_name</h4>
                                    <p class='card-text'>$item_description</p>
                                    <h5>$$item_price</h5>
                                    <a href='#' class='btn btn-primary'>ADD TO CART</a>
                                </div>
                            </div>
                        </div>";

                    }
                    ?>

                </div>
            </div>
            <!-- Products Contents -->
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container-info p-3 text-center bg-dark">
        <p>Designed by Anonymous</p>
    </div>
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>
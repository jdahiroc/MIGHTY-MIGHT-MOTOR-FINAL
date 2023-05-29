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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid" id="nav">
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
                            <a class="nav-link" href="/MIGHTY-MIIGHT-MOTOR/orderpage/cart.php">Cart <img
                                    style="width:20px; height:20px;"
                                    src="/MIGHTY-MIIGHT-MOTOR/img/icons/shopping-cart.png" alt="cart-shopping"><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#nav" style="color:#E38B29;"><strong>Total
                                    Price: $
                                    <?php total_cart_price(); ?>
                                </strong></a>
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
                    <!-- calling functions -->
                    <?php
                    // $ip = getIPAddress();
                    // echo 'User Real IP Address - ' . $ip;
                    cart();
                    ?>
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
                        echo "<div class='col-md-3 mt-2 mb-4'>
                            <div class='card' style='width: 18rem;'>
                                <img src='/MIGHTY-MIIGHT-MOTOR/admin/uploaded_product_images/$item_image' class='card-img-top' alt='#001'>
                                <div class='card-body'>
                                    <h4 style='color:#E38B29;'><strong>$item_name</strong></h4>
                                    <p class='card-text'><i>$item_description</i></p>
                                    <h5><strong>$$item_price</strong></h5>
                                    <a href='../orderpage/orderpage.php?add_to_cart=$product_id' class='btn btn-primary'>ADD TO CART</a>
                                </div>
                            </div>
                        </div>";
                    }
                    //get the ip address of user
                    function getIPAddress()
                    {
                        //whether ip is from the share internet  
                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        }
                        //whether ip is from the proxy  
                        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        }
                        //whether ip is from the remote address  
                        else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
                        return $ip;
                    }
                    // $ip = getIPAddress();
                    // echo 'User Real IP Address - ' . $ip;
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


<!-- functions -->
<?php
// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_address' and product_id=$get_product_id";

        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('Already In Cart')</script>";
            echo "<script>window.open('../orderpage/orderpage.php',' _self')</script>";
        } else {
            $insert_query = "Insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$get_ip_address', 0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('Item added successfully')</script>";
            echo "<script>window.open('../orderpage/orderpage.php',' _self')</script>";
        }
    }
}


// function cart item numbers it shows the number of items inside the cart
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_address = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $conn;
        $get_ip_address = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

        echo $count_cart_items;
    }
}

// function sum of total item price
function total_cart_price()
{
    global $conn;
    $get_ip_address = getIPAddress();
    $total = 0;
    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
    $result = mysqli_query($conn, $cart_query);

    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id']; //fetch the data
        $select_products = "Select * from `product` where product_id='$product_id'"; //select the table of product_id to get the value
        $result_products = mysqli_query($conn, $select_products); //checks connection from database then the output value of the fetch data of product_id

        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['item_price']); //collects all the prices into an array
            $product_values = array_sum($product_price); //sum the item prices from the array
            $total += $product_values; //total item prices
        }
    }
    echo $total; //display the prices of all selected items
}

?>
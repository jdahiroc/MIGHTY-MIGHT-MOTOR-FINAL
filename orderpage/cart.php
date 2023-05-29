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
    <!-- TAB ICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />

    <!-- External CSS-->
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/orderpage/orderpage.css">

    <!-- Internal CSS -->
    <style>
        .product_image {
            width: 85px;
            height: 85px;
            object-fit: contain;
        }
    </style>

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
                            <a class="nav-link" href="/MIGHTY-MIIGHT-MOTOR/orderpage/cart.php">Cart <img
                                    style="width:20px; height:20px;"
                                    src="/MIGHTY-MIIGHT-MOTOR/img/icons/shopping-cart.png" alt="cart-shopping"><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- 2nd Child -->
        <div class="bg-light">
            <h3 class="h3 text-center p-3">Cart</h3>
        </div>
        <!-- 3rd Child Table Cart Contents -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-borderless text-center">

                        <tbody>
                            <!-- PHP to display data -->
                            <?php
                            $get_ip_address = getIPAddress();
                            $total = 0;
                            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                            $result = mysqli_query($conn, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "<thead>
                                <tr>
                                    <th>
                                        <h5>Product Name</h5>
                                    </th>
                                    <th>
                                        <h5>Product Image</h5>
                                    </th>
                                    <th>
                                        <h5>Quantity</h5>
                                    </th>
                                    <th>
                                        <h5>Price</h5>
                                    </th>
                                    <th></th> <!--Remove-->
                                    <th colspan='2'></th> <!--Operations-->
                                </tr>
                            </thead>";

                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id']; //fetch the data
                                    $select_products = "Select * from `product` where product_id='$product_id'"; //select the table of product_id to get the value
                                    $result_products = mysqli_query($conn, $select_products); //checks connection from database then the output value of the fetch data of product_id
                            
                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        // fetching data from database
                                        $product_price = array($row_product_price['item_price']); //collects all the prices into an array
                                        $price_table = $row_product_price['item_price'];
                                        $product_title = $row_product_price['item_name'];
                                        $product_image = $row_product_price['item_image'];

                                        $product_values = array_sum($product_price); //sum the item prices from the array
                                        $total += $product_values; //total item prices
                            
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $product_title ?>
                                            </td>
                                            <td><img class="product_image"
                                                    src="/MIGHTY-MIIGHT-MOTOR/admin/uploaded_product_images/<?php echo $product_image ?>"
                                                    alt=""></td>
                                            <td><input type="text" name="qty" id="qty" class="form-input w-50"></td>
                                            <!-- php code for update -->
                                            <?php
                                            $get_ip_add = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantities = $_POST['qty'];
                                                $update_cart = "update `cart_details` set quantity=$quantities where
                                            ip_address='$get_ip_add'";
                                                $result_products_carts = mysqli_query($conn, $update_cart);
                                                $total = $total * $quantities;
                                            }
                                            ?>
                                            <td>
                                                $
                                                <?php echo $total ?>
                                            </td>
                                            <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                                                <!-- <button class="btn btn-dark border-0 mx-2">Update</button> -->
                                                <input type="submit" value="Update Cart" class="btn btn-dark border-0 mx-2"
                                                    name="update_cart">
                                                <!-- <button class="btn btn-danger border-0 mx-2">Remove</button> -->
                                                <input type="submit" value="Remove" class="btn btn-danger border-0 mx-2"
                                                    name="remove_cart" id="remove_cart">
                                            </td>
                                        </tr>
                                    <?php }
                                }
                            } else {
                                echo "<h2 class='text-center mt-3 text-info'> Your Cart Is Empty! :(</h2>";
                            } ?>
                        </tbody>
                    </table> <!--End of Table-->
                    <?php
                    $get_ip_address = getIPAddress();
                    $total = 0;
                    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_address'";
                    $result = mysqli_query($conn, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "
                        <div class='d-flex px-5 mt-4'>
                        <a class='nav-link' href='' style='color:#E38B29; font-size: 22px;'><strong class='text-info'>Subtotal: $
                                 $total
                            </strong></a>
                        </div>
                        <div class='continue-button d-flex justify-content-end'>
                            <button class='btn btn-dark mb-3'><a href='/MIGHTY-MIIGHT-MOTOR/orderpage/orderpage.php'
                                    class='text-decoration-none btn btn-dark'>Continue
                                    Shopping</button></a>
                        </div>
                        <div class='checkout-button d-flex justify-content-end'>
                            <button class='btn btn-primary mb-3'><a href='/MIGHTY-MIIGHT-MOTOR/orderpage/checkoutpage.php'
                                    class='btn btn-primary text-decoration-none'>Checkout</button></a>
                        </div>";

                    } else {
                        echo "<div class='continue-button d-flex justify-content-end'>
                        <button class='btn btn-dark mb-3'><a href='/MIGHTY-MIIGHT-MOTOR/orderpage/orderpage.php'
                                class='text-decoration-none btn btn-dark'>Continue
                                Shopping</button></a>
                    </div>";
                    }
                    ?>
            </div>
        </div>
    </div>
    </form>
    <!-- function for delete item from cart -->
    <?php
    function remove_cart_item()
    {
        global $conn;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['remove_item'] as $remove_id) {
                echo $remove_id;
                $delete_query = "DELETE from `cart_details` where product_id=$remove_id";
                $run_delete = mysqli_query($conn, $delete_query);

                if ($run_delete) {
                    echo "<script>windows.open('cart.php','_self');</script>";
                }
            }
        }
    }

    echo $remove_item = remove_cart_item();
    ?>
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
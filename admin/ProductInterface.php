<?php
require_once('connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/ProdInt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- tab icon link -->
    <link rel=" shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />

    <!-- Google Font Link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <title>Product Usermanagement</title>
</head>

<body>
    <!--Header-->
    <div class="header">
        <h5>MIGHTY MIGHT MOTOR</h5>
    </div>
    <div class="d-flex justify-content-start mt-4">
        <button><a href="/MIGHTY-MIIGHT-MOTOR/admin/index.php" class="text-decoration-none btn btn-dark">Back
                to
                dashboard</a></button>
    </div>

    <!--Table-->
    <div class="table">
        <div class="d-flex justify-content-center mt-4">
            <h1 style="font-family: 'Poppins', sans serif">Product Interface</h1>
        </div>
        <table style="width: 100%" class="table center-table" id="table1">
            <thead>
                <tr class="text-center">
                    <th>Product ID</th>
                    <th>Item Name</th>
                    <th>Item Description</th><A> </A>
                    <th>Item Keyword</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Date & Time Added</th>
                </tr>

            </thead>

            <tbody id="display" class="text-center">
                <?php
                $query = "Select * from `product`";
                $result = mysqli_query($conn, $query);

                // to display items from database
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        //fetching data from database
                        $product_id = $row['product_id'];
                        $item_name = $row['item_name'];
                        $item_description = $row['item_description'];
                        $item_keyword = $row['item_keyword'];
                        $item_image = $row['item_image'];
                        $item_price = $row['item_price'];
                        $date = $row['date'];
                        $status = $row['status'];


                        // to display all the fetched data from database to website
                        echo '<tr>
                        <th class="overflow-x-auto">' . $product_id . '</th> 
                        <td class="overflow-x-auto">' . $item_name . '</td>
                        <td class="overflow-x-auto">' . $item_description . '</td>
                        <td class="overflow-x-auto">' . $item_keyword . '</td>
                        <td class="overflow-x-auto"><img src="/MIGHTY-MIIGHT-MOTOR/admin/uploaded_product_images/' . $item_image . '" width="100" height="100"></td>
                        <td class="overflow-x-auto">' . $item_price . '</td>
                        <td class="overflow-x-auto">' . $date . '</td>
                        <td
                        <button class="btn btn-danger m-auto overflow-x-auto"><a href="/MIGHTY-MIIGHT-MOTOR/admin/delete_product.php?deleteid=' . $product_id . '" class="text-decoration-none text-light">Delete</a></button>
                        </td> 
                </tr>';
                    }
                }
                ?>

            </tbody>

            <script type="text/javascript" src="fetch.js"></script>
    </div>
    </div>
</body>

</html>
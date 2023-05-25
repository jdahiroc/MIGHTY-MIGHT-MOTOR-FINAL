<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/ProdInt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />


    <title>Product Interface</title>
</head>

<body>

    <!--Header-->
    <div class="header">
        <h5>Mighty-Mite Motors</h5>
    </div>

    <!--Table-->
    <div class="table">
        <div class="d-flex justify-content-center mt-4">
            <h1>Product Interface</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class=""><select class="m-2" name="combo" id="sel1"></select></div>
            <div class=""><button class="m-2 btn btn-primary" id="btnsearch">Search</button></div>
        </div>
        <table style="width: 100%" class="table center-table" id="table1">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Order Details</th><A> </A>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date & Time of Purchase</th>
                    <div class="d-flex justify-content-center mt-4">
                        <a class="btn btn-success m-2" href="#">ADD</a>
                        <a class="btn btn-danger m-2" href="#">DELETE</a>
                    </div>
                </tr>

            </thead>

            <tbody id="display"></tbody>

            <script type="text/javascript" src="fetch.js"></script>
    </div>
    </div>
</body>

</html>
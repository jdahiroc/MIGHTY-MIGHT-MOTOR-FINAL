<!-- Connect to database -->
<?php
include('../admin/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/MIGHTY-MIIGHT-MOTOR/css/login_interface.css" />
    <link rel="shortcut icon" type="image/x-icon" href="/MIGHTY-MIIGHT-MOTOR/img/head-icon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />

    <title>Login</title>
</head>

<body>
    <!--NAVIGATION SECTION-->
    <section>
        <header>
            <a href="/MIGHTY-MIIGHT-MOTOR/index.html"><img src="/MIGHTY-MIIGHT-MOTOR/img/logo.jpg" class="logo"
                    alt="Mighty_Might_Motor" /></a>
            <ul>
                <li><a href="/MIGHTY-MIIGHT-MOTOR/index.html">Back to Home</a></li>
            </ul>
        </header>
        <div class="wrapper">
            <form action="" method="post">
                <h2 class="d-flex justify-content-center">Login</h2>
                <div class="pt-2 g-col-6">
                    <label>Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" ;>
                </div>
                <div class="pt-2 g-col-6">
                    <label>Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control">
                </div>
                <div class="form-group mt-3 mb-3 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Login" id="user_login" name="user_login" ;
                        href="/MIGHTY-MIIGHT-MOTOR/admin/index.php">
                </div>
                <p>Don't have an account? <a href="/MIGHTY-MIIGHT-MOTOR/admin/CreateUserInterface.php">Create an
                        Account.</a></p>
            </form>
        </div>
    </section>

</html>

<!--================================================================================================ -->
<!-- CODE FOR LOGIN SYSTEM -->
<?php
// // Step 1: Establish database connection
// $hostname = "localhost";
// $username = "root";
// $password = "";
// $database = "mightymightmotor";

// $conn = mysqli_connect($hostname, $username, $password, $database);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Step 2: Retrieve user input
// $username = $_POST['userName'];
// $password = $_POST['passWord'];

// // Step 3: Query the database
// $query = "SELECT * FROM user WHERE username = ?";
// $stmt = mysqli_prepare($conn, $query);
// mysqli_stmt_bind_param($stmt, "s", $username);
// mysqli_stmt_execute($stmt);

// // Step 4: Execute the query
// $result = mysqli_stmt_get_result($stmt);

// $storedUsername = null;
// $storedPassword = null;

// // Step 5: Fetch the results
// if ($row = mysqli_fetch_assoc($result)) {
//     $storedUsername = $row['username'];
//     $storedPassword = $row['password'];

//     // Step 6: Validate and authenticate
//     if ($password === $storedPassword) {
//         // Credentials match, user is authenticated
//         echo "Login successful!";
//     } else {
//         // Invalid password
//         echo "Invalid password!";
//     }
// } else {
//     // User not found
//     echo "User not found!";
// }

// // Close the database connection
// mysqli_close($conn);

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "Select * from `user` where username='$user_username'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['user_password'])) {

        } else {
            echo "<script>alert('Malii Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }

}
?>
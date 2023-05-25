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
                <li><a href="/MIGHTY-MIIGHT-MOTOR/index.html">Home</a></li>
            </ul>
        </header>
        <div class="wrapper">
            <form action="" method="post">
                <h2 class="d-flex justify-content-center">Login</h2>
                <div class="pt-2 g-col-6">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" ;>
                </div>
                <div class="pt-2 g-col-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group mt-3 mb-3 d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Login" id="Login" ;
                        href="/MIGHTY-MIIGHT-MOTOR/ADMIN/UserManagementInterface.php">
                </div>
                <p>Don't have an account? <a href="CreateUserInterface.php">Create an Account.</a></p>
            </form>
        </div>
    </section>

</html>
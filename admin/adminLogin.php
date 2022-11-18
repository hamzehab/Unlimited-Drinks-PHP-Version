<?php
    session_start();
    require('../model/db_connect.php');
    include('../model/account_db.php');

    if(isset($_POST['login'])) $login_error = login_admin();

    if(isset($_SESSION['adminID'])) header('location: index.php');
    else{
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body style="background-color: #E8E8E8;">
        <div class="container mt-3">
            <a href="../index.php" class="mt-3"><i class="bi bi-arrow-return-left"></i>Back to Homepage</a>
            <div class="text-center pb-5">
                <h1>Admin Login to Unlimited Drinks</h1>
            </div>
            <div class="border border-light p-3 rounded-5 row bg-dark">
                <h4 class="p-3" style="color: white;">Login</h4>
                <?php if(!empty($login_error) && isset($login_error)) echo '<div class="alert alert-danger p-3">' . $login_error. '</div>'; ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" name="email" type="email" placeholder="Email Address">
                        <label for="floatingInput">Email Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="col text-center p-3">
                        <button name="login" class="btn btn-light">&emsp;Login&emsp;</button><br><br>
                        <a class="link-light" href="../Login/Login.php">Customer Login</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php } ?>
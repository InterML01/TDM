<?php 
// include('server.php'); 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>


    <Link rel="stylesheet" href="css/style.css">
    </Link>
</head>

<body charset="utf-8">


    <div class="header">
        <h2>Login</h2>
    </div>
    <div class="container">
        <form action="login_db.php" method="post">

            <!-- -------------------- -->
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                  ?>
                </h3>
            </div>

            <?php endif ?>
            <!-- -------------------- -->
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                </h3>
            </div>

            <?php endif ?>
            <!-- -------------------- -->
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <!-- <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div> -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="input-group">
                <button type="submit" name="login_user" class="btn">Login</button>
            </div>
            <p>Not yet a member? <a href="register.php">Sign up</a></p>
        </form>
    </div>

</body>

</html>
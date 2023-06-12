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
    <link rel="stylesheet" href="css/style.css">
    <style>
    .container a {
        color: #f8ab47;
        font-size: 18px;
        text-decoration: none;
        font-weight: bold;
        font-family: Arial, sans-serif;
        /* background: #f8ab47; */
    }

    ::placeholder {
        /* color: #1c3d61; */
        color: #778492;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        color: #fff;
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var audio = new Audio("https://www.fesliyanstudios.com/play-mp3/387");
        audio.volume = 0.5; // Adjust the volume (0.0 to 1.0)
        const loginButton = document.querySelector(".btn");
        loginButton.addEventListener("mouseenter", () => {
            audio.currentTime = 0; // Reset the audio to start from the beginning
            audio.play();
        });
    });

    function preventSpace(event) {
        if (event.keyCode === 32) {
            event.preventDefault();
        }
    }
    </script>
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
                <input placeholder="Enter your Username" type="text" name="username" onkeydown="preventSpace(event)"
                    pattern="^\S+$" title="Username must not contain spaces">
            </div>

            <!--  -->

            <!--  -->
            <div class="input-group">
                <label for="password">Password</label>
                <input placeholder="Enter your Password" type="password" name="password">
                <!-- <input placeholder="Enter your Password" type="password" name="password" onkeydown="preventSpace(event)" pattern="^\S+$" title="Password must not contain spaces"> -->

            </div>
            <!-- <br> -->
            <div class="input-group">
                <button type="submit" name="login_user" class="btn">Login
                </button>
            </div>
            <p>Not yet a member? <a href="register.php">Sign up</a></p>
        </form>
    </div>

</body>

</html>
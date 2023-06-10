<?php
session_start();
// include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        color: #1c3d61;
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var audio = new Audio("https://www.fesliyanstudios.com/play-mp3/387");
        audio.volume = 0.5; // Adjust the volume (0.0 to 1.0)
        const registerButton = document.querySelector(".btn");
        registerButton.addEventListener("mouseenter", () => {
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

<body>

    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
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
        <div class="input-group">
            <label for="username">Username</label>
            <input placeholder="Enter your Username" type="text" name="username" onkeydown="preventSpace(event)" pattern="^\S+$" title="Username must not contain spaces">

            <!-- <input placeholder="Enter your Username" type="text" name="username"
                value="<?php echo isset($username) ? htmlspecialchars($username, ENT_QUOTES) : ''; ?>"> -->
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input placeholder="Enter your Email" type="email" name="email" onkeydown="preventSpace(event)" pattern="^\S+$" title="Email must not contain spaces">
            <!-- <input placeholder="Enter your Email" type="email" name="email"> -->
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <!-- <input placeholder="Enter your Password" type="password" name="password_1"> -->
            <input placeholder="Enter your Password" type="password" name="password_1" onkeydown="preventSpace(event)" pattern="^\S+$" title="Password must not contain spaces">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <!-- <input placeholder="Enter your Password" type="password" name="password_2"> -->
            <input placeholder="Enter your Password" type="password" name="password_2" onkeydown="preventSpace(event)" pattern="^\S+$" title="Password must not contain spaces">
        </div>
        <!-- <br> -->
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php"
        style="color: #f8ab47; font-family: Arial, sans-serif;"
        >Sign in</a></p>
    </form>

</body>

</html>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Game</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        function goBack() {
            window.history.back();
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            var audio = new Audio("https://www.fesliyanstudios.com/play-mp3/387");
            audio.volume = 0.5; // Adjust the volume (0.0 to 1.0)
            const logoutLink = document.querySelector(".btn.logout");
            const gamePagesLink = document.querySelector(".btn.game-pages");
            logoutLink.addEventListener("mouseenter", () => {
                audio.currentTime = 0;
                audio.play();
            });
            gamePagesLink.addEventListener("mouseenter", () => {
                audio.currentTime = 0;
                audio.play();
            });
        });
    </script>
</head>

<body>
    <div class="header">
        <h2>Home</h2>
    </div>
    <div class="container">
        <div class="content">
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
            <?php if (isset($_SESSION['username'])) : ?>
                <br>
                <div class="navigation">
                    <h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong><span></span></h3>
                    <br>
                    <a href="index.php?logout='1" style="color: red" class="btn logout">Logout</a>
                    <br> <br>
                    <a href="game.php" class="btn game-pages">Game Pages</a>
                </div>
            <?php endif ?>
        </div>
    </div>
</body>

</html>

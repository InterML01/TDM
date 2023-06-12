<?php
include('server.php');
session_start();
$_SESSION['email'] = $email; 
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
    <meta charset="utf-8">
    <title>TDM PROJECT</title>
    <link rel="stylesheet" type="text/css" href="css/styleG.css">
    <style>
    .container {
        position: relative;
    }

    .go-back-btn {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #223243;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 40%;
    }

    .go-back-btn:hover {
        background-color: #243243;
    }

    .avatar {
        position: absolute;
        top: 40px;
        right: 60px;
        display: flex;
        align-items: center;
        font-size: 20px;
        color: #fff;
        margin: 10px;

    }

    .avatar2 {
        position: absolute;
        top: 55px;
        right: 60px;
        display: flex;
        align-items: center;
        font-size: 20px;
        color: #fff;
        margin: 10px;

    }

    .avatar1 {
        position: absolute;
        top: 10px;
        right: 60px;
        display: flex;
        align-items: center;
        font-size: 20px;
        color: #fff;
        margin: 10px;

    }

    .avatar-image {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        justify-content: right;
        align-items: right;
    }

    .avatar-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }



    /* Rest of your existing CSS styles */
    </style>
    <script>
    function goBack() {
        window.history.back();
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const audioSources = [
            'https://www.fesliyanstudios.com/play-mp3/5248',
            'https://www.fesliyanstudios.com/play-mp3/5262',
            'https://www.fesliyanstudios.com/play-mp3/5265'
        ];

        const cards = document.querySelectorAll(".card");
        cards.forEach((card, index) => {
            card.addEventListener("mouseenter", () => {
                var audio = new Audio(audioSources[index]);
                audio.volume = 0.5; // Adjust the volume (0.0 to 1.0)
                audio.currentTime = 0;
                audio.play();
            });
        });
    });
    </script>
</head>

<body>
    <button class="go-back-btn" onclick="goBack()"> <strong>Back</strong></button>

    <?php if (isset($_SESSION['username'])) : ?>

    <?php
    // Retrieve email from the database based on the username
    $username = $_SESSION['username'];
    $query = "SELECT email,gender FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $gender = $row['gender'];
    }
    ?>
    <div class="avatar1">
        <h3 style="color: #fff;">Player: <?php   echo $_SESSION['username']; ?></h3><br>
    </div>

    <?php if (isset($gender)) : ?>


    <div class="avatar2">

        <?php if ($gender === "male") : ?>
        <div class="avatar-image">
            <img src="img/boy.jpeg" alt="Male Image">
        </div>

        <?php else : ?>
        <div class="avatar-image">
            <img src="img/girl.jpeg" alt="Female Image">
        </div>
        <?php endif; ?>
        <!-- <h3 style="color: #fff;">Gender: <?php echo $gender; ?></h3> -->
    </div>

    <?php endif; ?>

    <?php endif; ?>

    <!-- <?php if (isset($email)) : ?>
        <div class="avatar">
            <h3 style="color: #fff;">Email: <?php echo $email; ?></h3>
        </div>
        <?php endif; ?> -->


    <div class="container">
        <div class="card">
            <div class="lines"></div>
            <div class="imgBx">
                <img src="img/rope.png">
                <!-- <img src="img/ropeC.png"> -->
            </div>
            <div class="content">
                <div class="details">
                    <h2>Halat Oyunu</h2>
                    <!-- <p>Halat Oyunu</p> -->
                    <a href="oyunlar/halat_oyun2/index.html">PLAY</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="lines"></div>
            <div class="imgBx">
                <img src="img/tree.png">
            </div>
            <div class="content">
                <div class="details">
                    <h2>Fidan Oyunu</h2>
                    <!-- <p>Fidan Oyunu</p> -->
                    <a href="#">PLAY</a>
                </div>
            </div>
        </div>

        <!-- <div class="container"> -->

        <div class="card">
            <div class="lines"></div>
            <div class="imgBx">
                <img src="img/car.png">
            </div>
            <div class="content">
                <div class="details">
                    <h2>Math Runner</h2>
                    <!-- <p>Math Runner</p> -->
                    <a href="oyunlar/math_runner02/index.html">PLAY</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="lines"></div>
            <div class="imgBx">
                <img src="img/ballon.png">
            </div>
            <div class="content">
                <div class="details">
                    <h2>GAME 4</h2>
                    <!-- <p>GAME 4.</p> -->
                    <a href="oyunlar/math/index.html">PLAY</a>
                </div>
            </div>
        </div>
    </div>

    </div>

</body>

</html>
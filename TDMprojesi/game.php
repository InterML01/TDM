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
      top: 10px;
      right: 60px;
      display: flex;
      align-items: center;
      font-size: 26px;
      color: #fff;
    }
/* 
    .avatar img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      margin-right: 5px;
    } */

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
  <div class="container">
    <?php if (isset($_SESSION['username'])) : ?>
      <div class="avatar">
        <!-- <img src="<?php echo $randomLogoUrl; ?>" alt="User Avatar"> -->
        <h3 style="color: #fff;">Player : <strong><?php echo $_SESSION['username']; ?></strong></h3>
      </div>
    <?php endif ?>

    <div class="card">
      <div class="lines"></div>
      <div class="imgBx">
        <img src="img/game1.png">
      </div>
      <div class="content">
        <div class="details">
          <h2>GAME 1</h2>
          <p>Halat Oyunu</p>
          <a href="oyunlar/halat_oyun2/index.html">PLAY</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="lines"></div>
      <div class="imgBx">
        <img src="img/game2.png">
      </div>
      <div class="content">
        <div class="details">
          <h2>GAME 2</h2>
          <p>Fidan Oyunu</p>
          <a href="#">PLAY</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="lines"></div>
      <div class="imgBx">
        <img src="img/game3.png">
      </div>
      <div class="content">
        <div class="details">
          <h2>GAME 3</h2>
          <p>Math Runner</p>
          <a href="oyunlar/math_runner02/index.html">PLAY</a>
        </div>
      </div>
    </div>
ิ<br>
<br>
   
      <button class="go-back-btn" onclick="goBack()"> <strong>Back</strong></button>
    
  </div>
</body>
</html>

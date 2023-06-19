<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TDM Games</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styleH.css">

   <style>
      .container {
         background: #223243;
         background: #164e8a;


      }
   </style>

   <script>
      document.addEventListener('DOMContentLoaded', (event) => {
         var audio = new Audio("https://www.fesliyanstudios.com/play-mp3/387");
         
         audio.volume = 0.5; // Adjust the volume (0.0 to 1.0)
         const buttons = document.querySelectorAll(".btn");
         buttons.forEach(button => {
            button.addEventListener("mouseenter", () => {
               audio.currentTime = 0; // Reset the audio to start from the beginning
               audio.play();
            });
         });
      });
   </script>

</head>
<body>
   <div class="container">
      <div class="content">
         <h1>Discover the Joy of Numbers!</h1>
         <br>
         <a href="register.php" class="btn">Register</a>
         <a href="login.php" class="btn">Login</a>
      </div>
   </div>
</body>
</html>


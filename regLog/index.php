<?php
session_start(); // 3 dec session

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first"; // เกบ session name msg  
    //& redirect to login page
    header('location: login.php');
}

// มีการกดปุ่มนี้ รับค่า get มา ให้ destroy session
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
    <title>Home Page</title>
    <Link rel="stylesheet" href="style.css">
    </Link>
</head>

<body>

    <div class="header">
        <h2>Home Page</h2>
    </div>
    <div class="content">
        <!-- notification msg -->
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

        <!-- 1 logged in user information ถ้ามี _SESSION username ไห้ทำไร-->
        <?php if(isset($_SESSION['username'])): ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p><a href="index.php?logout='1" style="color: red" ;>Logout</a></p>
        <!--2 ส่งค่า get param ไป ชื่อ logout -->
        <?php endif ?>


    </div>

</body>

</html>
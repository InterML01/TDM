<?php 
    session_start();
    include('server.php');
    $errors = array();

    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($username)){
            array_push($errors, "username is req");
        }

        if(empty($password)){
            array_push($errors, "password is req");
        }

        if(count($errors) == 0) { // no error => encryp เข้าหรัสก่อน save in db
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username; // เกบ data(name) in session
            // $_SESSION['password'] = $password;
            $_SESSION['success'] = "You are now logged in 2";
            header('location: index1.php');
            } else {
                // เกบ session error and redirect to Login page
                array_push($errors, "wrong username/password combination");
                $_SESSION['error'] = "wrong username or password combination 2";
            header('location: login.php');
            }
        }     else {
            // เกบ session error and redirect to Login page
            array_push($errors, "wrong username/password combination");
            $_SESSION['error'] = "Please fill your information";
        header('location: login.php');
        } 

    }
?>
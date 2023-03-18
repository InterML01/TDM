<?php
    // dec session for keep session
    session_start();
    include('server.php'); 
    $errors = array(); // crt var

    if (isset($_POST['reg_user'])) { // check ว่ามึการเกบ
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "username is required");
        }
        if (empty($email)) {
            array_push($errors, "email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "password is required");
        }
        if (empty($password_1) || empty($password_2) || $password_1 != $password_2) {
            array_push($errors, "the two passwords do not match");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // มี user in system
            if ($result['username'] === $username) {
                array_push($errors, "username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }

        if(count($errors) == 0) { //if no error => encryp เข้าหรัสก่อน save in db
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email','$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username; // เกบ data(name) in session
            $_SESSION['success'] = "You are now registerd in";
            header('location: login.php');
        } else {
              // เกบ session error and redirect to register page
              array_push($errors, "Username or Email already exists !!!");
              $_SESSION['error'] = "wrong username or password combination !!! try again";
          header('location: register.php');
          }
        

    }
    ?>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_db";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn) { //ถ้าไม่มีการเชือมต่อ
        die("Connect failed".mysqli_connect_error());
    } else {
        echo "Connect successfuly";
    }


?>
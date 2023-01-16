<?php
session_start();

    include("db_Connection.php");
    include("check_function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $uname = $_POST['user_name'];
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];

        if(!empty($uname) && !empty($password) && !is_numeric($uname)){
            // $user_id = random_num(8);
            $query = "insert into users (user_id, username, email_id, password) values ('$user_id','$uname', '$email_id', '$password')";
            mysqli_query($conn, $query);
            // header("Location: index.html");
        
        }
        else{
            echo "Invalid Credentials";
        }
    }
?>
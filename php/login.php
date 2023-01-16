<?php
session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login.html?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.html?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE Email='$uname' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Email'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['Email'] = $row['Email'];

                $_SESSION['Email'] = $row['Email'];

                $_SESSION['id'] = $row['id'];

                header("Location: index.html");

                exit();

            }else{

                header("Location: login.html?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: login.html?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: login.html");

    exit();

}
?>
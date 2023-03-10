<?php
session_start();

    include("db_Connection.php");
    include("check_function.php");
//signup
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $uname = $_POST['user_name'];
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];

        if(!empty($uname) && !empty($password) && !is_numeric($uname)){
            $user_id = random_int(5000, 10000);
            $query = "insert into users (user_id, username, email_id, password) values ('$user_id','$uname', '$email_id', '$password')";
            mysqli_query($conn, $query);
            header("Location: products.html");
			die();
        
        }
        else{
            echo "Invalid Credentials";
        }
    }
//login
	if($_SERVER['REQUEST_METHOD'] == "POST"){
        // $uname = $_POST['user_name'];
        $email_id = $_POST['email_id'];
        $password = $_POST['password'];

        if(!empty($email_id) && !empty($password)){
            // $user_id = random_int(5000, 10000);
            $select_query = "select * from users where email_id = '$email_id' limit 1";
            $result = mysqli_query($conn, $select_query);
			if($result){
					if($result && mysqli_num_rows($result) > 0){
						$user_data = mysqli_fetch_assoc($result);
						if($user_data['password'] === $password){
							$_SESSION['user_id'] = $user_data['user_id'];
							header("Location: products.html");
							die();
						}
					}
				}
				// echo "Invalid Credentials";

        }
        else{
            echo "Invalid Credentials";
        }
    }
?>
	
	<!DOCTYPE html>
    <html lang="en">
        <head>
            <!-- basic -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- mobile metas -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="initial-scale=1, maximum-scale=1">
            <!-- site metas -->
            <title>E FARM</title>
            <meta name="keywords" content="">
            <meta name="description" content="">
            <meta name="author" content="">
            <!-- style css -->
            <link rel="stylesheet" href="css/login.css">
        </head>
<body> 
<h2>Welcome to E FARM</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<!-- <form action="index.html" method="post"> -->
		<form method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="user_name" placeholder="Name" />
			<input type="email" name="email_id" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<!-- <form action="index.html" method="post"> -->
		<form method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" name="email_id" placeholder="Email" />
			<input type="password" name="password"  placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Log In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- Javascript files-->
<script src="js/login.js"></script>
</body>
</html>

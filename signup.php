<?php 
session_start();

    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $user_id = random_num(20);
            $query = "insert into user (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else{
            echo "Dien vao cac du lieu thich hop";
        }
    }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Sign Up</title>
 </head>
 <body style="background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000') ;">

 	<style type="text/css">
 		

 	#text{
 		height: 25px;
 		border-radius: 5px;
 		padding: 4px;
 		border: solid thin #aaa;
 		width: 100% ;
 	}

 	#button{
 		padding: 10px;
 		width: 100px;
 		color: white;
 		background-color: lightblue;
 		border: none;
 	}

 	#box{
 		background-color: grey;
 		margin: auto;
 		width: 300px;
 		padding: 20px;
 	}
 	</style>
	
 	<div id ="box">
 		<form method="post">
 			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
 			<input id="text" type="text" name="user_name"><br><br>
 			<input id="text" type="password" name="password"><br><br>
 			<input id="button" type="submit" name="Signup"><br><br>
			 <h5>Enter your new account name and your password</h5>

 			<a href="login.php">Click to Login</a><br><br>
 		</form>
 	</div>
 
 </body>
 </html>

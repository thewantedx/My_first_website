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
            
            $query = "select * from user where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result)
            {
		        if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
            }

           echo "Wrong username or password";
        }
        else{
            echo "Wrong username or password";
        }
    }




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Login</title>
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
 			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
 			<input id="text" type="text" name="user_name"><br><br>
 			<input id="text" type="password" name="password"><br><br>
 			<input id="button" type="submit" name="Login"><br><br>
			 <h5>Enter your account name and your password</h5>

 			<a href="signup.php">Click to Sign Up</a><br><br>
 		</form>
 	</div>
 
 </body>
 </html>
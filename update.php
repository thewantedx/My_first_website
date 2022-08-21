<?php  
session_start();

    include("connection.php");
    include("function.php");

    $user_data = check_login($con);
    $id = $_GET['updateid'];

    $sql = "Select id, name, email, mobile from user where id=$id";
    $result =  mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $name =$row['name'];
    $email =$row['email'];
    $mobile =$row['mobile'];
    


    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];

      $sql= "update user set id=$id, name='$name' ,email = '$email' , mobile = '$mobile' where id=$id";
      $result = mysqli_query($con,$sql);

      if($result){
        
        header('location:display.php');
      }
      else{
        die(mysqli_error($con));
      }
    }

    
   

    


?>




<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Huy</title>
</head>

<body
    style="background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000') ;">
    <p>If you want to logout click here</p>
    <a href="logout.php">Logout</a>


    <h1 style="font-family:verdana; text-align: center; font-size: 50px; color: tomato;">Update</h1>

    <h2 style="text-align: center;">
        What do you want to change, <?php echo $user_data['user_name']; ?>
    </h2>

    <div class="container" my-5>

        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name; ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email; ?>>
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile" autocomplete="off" value=<?php echo $mobile; ?>>
            </div>
            

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>


</body>

</html>
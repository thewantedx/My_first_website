<?php  
session_start();

    include("connection.php");
    include("function.php");

    $user_data = check_login($con);

    

    
   

    


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body
    style="background-image: url('https://img.freepik.com/free-vector/hand-painted-watercolor-pastel-sky-background_23-2148902771.jpg?w=2000') ;">
    <div class="container">
        <button class="btn btn-primary my-5 "><a href="index.php" class="text-light">Add information</a></button>

        <table class="table">
            <thead>
                <tr>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Chức năng</th>

                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "Select id, name, email, mobile from user ";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        while($row =mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $email= $row['email'];
                            $mobile = $row['mobile'];
                            echo '<tr>
                            <th scope="row">'.$name.'</th>
                            <td>'.$email.'</td>
                            <td>'.$mobile.'</td>
                            <td>
                            <button class = "btn btn-primary"><a href="update.php?updateid='.$id.'" class = "text-light">Update</a></button>
                            <button class = "btn btn-danger"><a href="delete.php?deleteid='.$id.'" class = "text-light">Delete</a></button>
                            </td>
                        </tr>';
                        }
                    }


                ?>

                
                
            </tbody>
        </table>
    </div>

</body>

</html>
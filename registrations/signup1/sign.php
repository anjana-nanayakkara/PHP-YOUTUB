<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql="insert into `registration`(username,password) values('$username','$password')";

    // $result=mysqli_query($con,$sql);

    // if($result){
    //     echo " Data inserted successfuly";
    // }

    // else{

    //     die(mysqli_error($con));
    // }


    $sql="select * from `registration` where username='$username'";

    $result=mysqli_query($con,$sql);

    if($result){

        $num=mysqli_num_rows($result);

        if($num>0){

            echo"User already exists";
        }
        
        else{

            $sql="insert into `registration`(username,password) values('$username','$password')"; 

            $result = mysqli_query($con,$sql);

            if($result){

                echo "signup success full";
            }
            
            else{

                die(mysqli_error($con));
            }
        }
    }




}



?>







<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Signup page</h1>
  <div class="container mt-5" >

  </div>
  <form action="sign.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="enter your user name" name="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="enter your password" name="password" >
  </div>
  
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
  </body>
</html>
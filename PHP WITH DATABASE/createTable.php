<?php


$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'phptutorial';

$con = mysqli_connect($hostname,$username,$password,$database);

if($con){

    echo "success";

    $sql = "create table `data`(`id` int(100) NOT NULL AUTO_INCREMENT,`username` varchar(100) NOT NULL,`email` varchar(100) NOT NULL,PRIMARY KEY(`id`))";

    $queryexecute = mysqli_query($con,$sql);

    if($con){

        echo "table created successfully";
        
    }

    else{

        die(mysqli_error($con));
    
    }

}

else{

    die(mysqli_error($con));

}


?>
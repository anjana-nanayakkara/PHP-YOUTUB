<!-- inserting data -->

<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'phptutorial';

$con = mysqli_connect($hostname,$username,$password,$database);

if($con){

    $sql = "insert into `data`(username,email) values('anjana','anjana@gmail.com')";

    $queryexecute = mysqli_query($con,$sql);

    if($queryexecute){

        echo "data added successfuly";

    }

    else{

        die(mysqli_error($con));
    }

}

else{

    die(mysqli_error($con));
}

?>
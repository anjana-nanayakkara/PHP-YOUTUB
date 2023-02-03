<!-- inserting data -->

<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'phptutorial';

$con = mysqli_connect($hostname,$username,$password,$database);

if($con){

    $sql = "update `data`set `username` = 'john wick' where `username` = 'anjana'";

    $queryexecute = mysqli_query($con,$sql);

    if($queryexecute){

        echo "data updated successfuly";

    }

    else{

        die(mysqli_error($con));
    }

}

else{

    die(mysqli_error($con));
}

?>
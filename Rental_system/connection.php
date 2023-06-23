<?php

$conn=mysqli_connect('localhost','root','','rental_system');

if($conn)
{
    // echo ("Connected Successfully!");
}
else{
    echo "Not connected!";
}

?>
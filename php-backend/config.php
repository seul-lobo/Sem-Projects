<?php 
    $conn = mysqli_connect("localhost","root","","chatWeb");
    if(!$conn){
        echo "Database not Connected!" . mysqli_connect_error();
    }
?>
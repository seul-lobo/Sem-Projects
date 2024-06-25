<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}"); //not displaying signed in user      
    $output = "";                                                                           //also need to remove from searching
    

    if(mysqli_num_rows($sql) == 1){ //only current user signed in
        $output .= "No users are available to chat!"; 
    }
    elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }

    echo $output;
?>
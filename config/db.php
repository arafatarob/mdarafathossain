<?php
    $conn = new mysqli('localhost', 'root', '', 'project-controller');
    if($conn->connect_error){
        die($conn->connect_error);
    }
?>

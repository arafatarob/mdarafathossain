<?php
    require '../config/db.php';

    if(isset($_POST['formSubmit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];

        $insert = $conn->query("INSERT INTO users(name, email, role, password)
        VALUES('$name', '$email', '$role', '$password')
    ");

        if($insert){
            echo "<script>alert('Account Created)</script>";
            header('Location: ../auth/login.php');
            exit();
        }else{
            echo "<script>alert('Account Created Failed!')</script>";
            header('Location: ../auth/signup.php');
        }

    }


?>

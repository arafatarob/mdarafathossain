<?php
session_start();
    require '../config/db.php';

    $id = $_SESSION['user_id'];
    if(isset($_POST['change_password'])){
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Fetch the current password from the database
        $stm = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stm->bind_param("i", $id);
        $stm->execute();
        $result = $stm->get_result();
        $row = $result->fetch_assoc();

        if($oldPassword === $row['password']){
            echo "old Password is correct";
            if($newPassword === $confirmPassword){
                // Update the password in the database
                $stm = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                $stm->bind_param("si", $newPassword, $id);
                $stm->execute();
                echo "password changed successfully";
                header("Location: ../dashboard/profile.php");
            }else{
                echo "new password and confirm password do not match";
            }
        }else{
            echo "old Password is incorrect";
        }
    }


?>

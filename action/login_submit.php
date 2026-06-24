<?php
session_start();
    require '../config/db.php';

    if(isset($_POST['loginSubmit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $insert = $conn->query("SELECT users.id, users.password, users.name, role.role_name FROM users
          INNER JOIN role ON users.role = role.id WHERE users.email='$email' ");

        $users = $insert->fetch_assoc();


        if ($users) {
          if($password === $users['password']){

            $_SESSION['user_id'] = $users['id'];
            $_SESSION['user_name'] = $users['name'];
            $_SESSION['user_role'] = $users['role_name'];

            $userId = $users['id'];
            $updateQuery = "UPDATE users SET users_activity = NOW() WHERE id = ?";
            $stm = $conn->prepare($updateQuery);
            $stm->bind_param("i", $userId);
            $stm->execute();
            $stm->close();

              echo "<script>alert('logged in')</script>";
              header('Location: ../dashboard/dashboard.php');
              exit();
          }else{
              echo "<script>alert('incorrect password!');</script>";
              header('Location: ../auth/login.php');
              exit();
          }
        }
          else{
            echo "<script>alert('logged in Failed!');</script>";
            header('Location: ../auth/login.php');
            exit();
        }

    }


?>

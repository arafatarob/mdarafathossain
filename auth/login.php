<?php
    require '../config/db.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
    <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>
    <div class="link_container">
        <a href="../index.php"><i class="fa-solid fa-chevron-left"></i> home</a>
    </div>

    <div class="container-custome">

        <div class="text-container">
            <h1>login here</h1>
            <p>login in to your account</p>
        </div>

        <form action="../action/login_submit.php" method="post">

            <div class="form-group">
                <label for="name">Email : </label>
                <input class="form-control" type="text" placeholder="Enter your Email" name="email">
            </div>

            <div class="form-group">
                <label for="name">password : </label>
                <input class="form-control" type="password" placeholder="Enter your password" name="password">
            </div>

            <div class="form-group text-center">
                <button class="bttn" type="submit" name="loginSubmit">login</button>
            </div>

            <div class="form-group text-center create">
                create your account! <a href="signup.php">click here</a>
            </div>

        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/script.js"></script>
</body>
</html>

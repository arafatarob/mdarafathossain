<?php 
    require '../config/db.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
            <h1>signup</h1>
            <p>create your account today</p>
        </div>

        <form action="../action/signup_submit.php" method="post">
            <div class="form-group">
                <label for="name">Name : </label>
                <input class="form-control" type="text" placeholder="Enter your Name" name="name">
            </div>

            <div class="form-group">
                <label for="name">Email : </label>
                <input class="form-control" type="text" placeholder="Enter your Email" name="email">
            </div>

            <div class="form-group">
                <label for="name">Role : </label>
                
                <select class="form-control" name="role" id="">
                    <option value="">Select your role</option>
                    <?php 
                        $select = $conn->query("SELECT * FROM role");

                        while($roles = $select->fetch_assoc()){
                    ?>
                    <option value="<?= $roles['id'] ?>"><?= $roles['role_name'] ?></option>
                    <?php } ?>
                </select>
                
            </div>

            <div class="form-group">
                <label for="name">password : </label>
                <input class="form-control" type="password" placeholder="Enter your password" name="password">
            </div>

            <div class="form-group text-center">
                <button class="bttn" type="submit" name="formSubmit">signup</button>
            </div>
            
            <div class="form-group text-center create">
                already have an account? or <a href="login.php">click here</a>
            </div>
            
        </form>
        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/script.js"></script>
</body>
</html>
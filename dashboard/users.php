<?php
session_start();
  require('../config/db.php');

  $select = $conn->query("SELECT users.id, users.name, users.email, users.role, users.password, users.created_at, users.users_activity, role.role_name
     FROM users INNER JOIN role ON users.role = role.id");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>dashboard</title>
    <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/dashboard.css">
  </head>
  <body>

      <?php
        require("./common/header.php");
        require("./common/sidebar.php");
      ?>
    <main>
      <div class="users">
        <div class="title">
          <div class="">
            All user's
          </div>
        </div>
        <table>
          <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>role</th>
            <th>created users</th>
            <th>active time</th>
            <?php if($_SESSION['user_role'] === 'CEO' || $_SESSION['user_role'] === 'Manager'){ ?>
              <th>action's</th>
            <?php } ?>
          </tr>
          <?php
            while ($users = $select->fetch_assoc()) {
          ?>
          <tr>
            <td>#<?= $users['id'] ?></td>
            <td><?= $users['name'] ?></td>
            <td><?= $users['email'] ?></td>
            <td><?= $users['role_name'] ?></td>
            <td><?= $users['created_at'] ?></td>
            <td>
              <?php
                if(!empty($users['users_activity'])){
                  echo date("d M : h:i A", strtotime($users['users_activity']));
                }else {
                  echo "first logged in";
                }
              ?>
            </td>
            <?php if($_SESSION['user_role'] === 'CEO' || $_SESSION['user_role'] === 'Manager'){ ?>
              <td class="bttns">
                <?php if($_SESSION['user_role'] === 'CEO'){ ?>
                  <div class="delete">
                    <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                  </div>
                  <div class="edit">
                    <a href="#"><i class="fa-solid fa-pen-ruler"></i></a>
                  </div>
                <?php } ?>
                <?php if($_SESSION['user_role'] === 'Manager'){ ?>
                  <div class="edit">
                    <a href="#"><i class="fa-solid fa-pen-ruler"></i></a>
                  </div>
                  <?php } ?>
              </td>
              <?php } ?>
          </tr>
        <?php } ?>
        </table>
      </div>
    </main>

    <script src="../assets/dashboard.js" charset="utf-8"></script>
  </body>
</html>

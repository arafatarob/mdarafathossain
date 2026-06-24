<?php
session_start();
  require('../config/db.php');

  $select = $conn->query("SELECT COUNT(id) AS total_users FROM users");
  $select_order = $conn->query("SELECT COUNT(id) AS total_orders FROM orders");
  $select_earning = $conn->query("SELECT SUM(amount) AS total_earning FROM orders");
  $select_complete = $conn->query("SELECT COUNT(id) AS completed_order FROM orders where status='completed' ");
  $select_pending = $conn->query("SELECT COUNT(id) AS pending_order FROM orders where status='pending' ");
  $select_cancalled = $conn->query("SELECT COUNT(id) AS cancalled_order FROM orders where status='cancalled' ");
  $select_user = $conn->query("SELECT users.id, users.name, users.email, users.password, users.role, users.users_activity, role.role_name
    FROM users INNER JOIN
    role ON users.role = role.id
  ");
  $select_orders = $conn->query("SELECT * FROM orders ORDER BY id DESC");
  $userId = $_SESSION['user_id'];
  $select_last_activity = "SELECT users_activity FROM users WHERE id = ?";
  $stm = $conn->prepare($select_last_activity);
  $stm->bind_param("i", $userId);
  $stm->execute();
  $get_result = $stm->get_result();
  $user = $get_result->fetch_assoc();


  $t_earning = $select_earning->fetch_assoc();
  $T_users = $select->fetch_assoc();
  $T_orders = $select_order->fetch_assoc();
  $C_orders = $select_complete->fetch_assoc();
  $P_orders = $select_pending->fetch_assoc();
  $c_orders = $select_cancalled->fetch_assoc();


  if($t_earning == null){
    $t_earning = 0;
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>dashboard</title>
    <script src="https://kit.fontawesome.com/e68d9b315c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/dashboard.css">
    <style media="screen">
      table, tr, th, td {
    border: none;
    background: transparent;
    box-shadow: none;
    padding: 6px;
}
    </style>
  </head>
  <body>

      <?php
        require("./common/header.php");
        require("./common/sidebar.php");
      ?>
    <main>
      <div class="dashboard">
        <div class="title">
          dashboard overview
        </div>
        <div class="title_card">
          Analytics
        </div>
        <div class="summery_inner">
          <div class="summery1 summery">
            <h2>Total User's : <br> <span><?php echo sprintf('%02d', $T_users['total_users']) ?></span></h2>
          </div>
          <div class="summery2 summery">
            <h2>Total Earning's : <br> <span><?php echo "$" . $t_earning['total_earning'] ?></span></h2>
          </div>
          <div class="summery2 summery">
            <h2>Total order's : <br> <span><?php echo sprintf('%02d', $T_orders['total_orders']) ?> </span></h2>
          </div>
          <div class="summery4 summery">
            <h2>Completed order's : <br> <span><?php echo sprintf('%02d', $C_orders['completed_order']) ?></span></h2>
          </div>
          <div class="summery5 summery">
            <h2>pending order's : <br> <span><?php echo sprintf('%02d', $P_orders['pending_order']) ?></span></h2>
          </div>
          <div class="summery6 summery">
            <h2>cancalled order's : <br> <span><?php echo sprintf('%02d', $c_orders['cancalled_order']) ?></span></h2>
          </div>
        </div>
        <div class="revenue">
          <div class="recentUsers">
            <div class="title_card">
              Recent User's
            </div>
            <div class="users">
              <div class="user_container">
                <div class="user_heading">
                  <h2>name</h2>
                  <h2>email</h2>
                  <h2>role</h2>
                  <h2>last activity</h2>
                </div>
                <?php while($users = $select_user->fetch_assoc()){ ?>
                  <div class="user_body">
                    <h2><?= $users['name'] ?></h2>
                    <h2><?= $users['email'] ?></h2>
                    <h2><?= $users['role_name'] ?></h2>
                    <h2>
                    <?php
                        if(!empty($users['users_activity'])){
                        $timeZone = new DateTimeZone('Asia/Dhaka');
                          $loginTime = new DateTime($users['users_activity'], $timeZone);
                          $currentTime = new DateTime('now', $timeZone);
                          $intervel = $currentTime->diff($loginTime);

                          if($intervel->d < 1 && $intervel->h < 1 && $intervel->i < 1){
                            echo "Just Now";
                          } elseif($intervel->d < 1 && $intervel->h < 1){
                            echo $intervel->i . " Minutes Ago";
                          }elseif($intervel->d < 1){
                            echo $intervel->h . " Hour Ago";
                          }else{
                            echo $intervel->d . " Day Ago";
                          }
                        }else{
                          echo "Never Active";
                        }
                     ?>
                   </h2>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="recentOrders">
            <div class="title_card">
              Recent order's
            </div>
            <div class="orders">
              <div class="order_container">
                <div class="order_heading">
                  <h2>details</h2>
                  <h2>client</h2>
                  <h2>amount</h2>
                  <h2>platform</h2>
                </div>
                <?php while($orders = $select_orders->fetch_assoc()){ ?>
                  <div class="order_body">
                    <h2><?= $orders['Contract_Details'] ?></h2>
                    <h2><?= $orders['client'] ?></h2>
                    <h2><?= $orders['amount'] ?></h2>
                    <h2><?= $orders['platform_name'] ?></h2>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="../assets/dashboard.js" charset="utf-8"></script>
  </body>
</html>

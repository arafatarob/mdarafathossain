<?php
session_start();
    require '../config/db.php';


    $orderId = $_GET['id'];

    $select = $conn->query("SELECT * from orders WHERE id = '$orderId' ");
    $order = $select->fetch_assoc();


    if(isset($_POST['buttonUpdate'])){
      $details = $_POST['details'];
      $date = $_POST['date'];
      $c_name = $_POST['clientName'];
      $type = $_POST['type'];
      $amount = $_POST['amount'];
      $status = $_POST['status'];
      $c_id = $_POST['clientID'];
      $c_pass = $_POST['clientPassword'];
      $platform = $_POST['platform'];

      $update = $conn->query("UPDATE orders SET Contract_Details = '$details', contract_date = '$date', client = '$c_name', type = '$type',
      amount = '$amount', status = '$status', client_id = '$c_id', client_password = '$c_pass', platform_name = '$platform'
      WHERE id = '$orderId'");

      if($update){
        echo "updated";
        header("Location: ../dashboard/orders.php");
      }else{
        echo "updated failed";
      }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>order update</title>
    <link rel="stylesheet" href="../assets/style.css">
  </head>
  <body>


      <div class="form-update_container">
        <form class="order_submit" method="post">
          <div class="cross_icon">
              <i class="fa-regular fa-circle-xmark"></i>
          </div>
          <h2>update an order</h2>
          <div class="form-row">
            <div class="inputBox details">
              <input type="text" name="details" value="<?= $order['Contract_Details'] ?>" class="form-controll" placeholder="enter the contract details">
            </div>
          </div>

          <div class="form-row">
            <div class="inputBox date">
              <input type="date" name="date" value="<?= $order['contract_date'] ?>" class="form-controll">
            </div>
          </div>

          <div class="form-row d-flex">
            <div class="inputBox name">
              <input type="text" name="clientName" value="<?= $order['client'] ?>" class="form-controll" placeholder="client name">
            </div>
            <div class="inputBox type">
              <input type="text" name="type" value="<?= $order['type'] ?>" class="form-controll" placeholder="enter type">
            </div>
            <div class="inputBox amount">
              <input type="text" name="amount" value="<?= $order['amount'] ?>" class="form-controll" placeholder="enter amount">
            </div>
          </div>

          <div class="form-row">
            <div class="inputBox">
              <select class="form-controll" name="status">
                <option value="Select"<?php echo ($order['status'] == 'Select') ? 'selected' : ''; ?>>Select</option>
                <option value="pending"<?php echo ($order['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="completed"<?php echo ($order['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
                <option value="cancalled"<?php echo ($order['status'] == 'cancalled') ? 'selected' : ''; ?>>Cancalled</option>
              </select>
            </div>
          </div>

          <div class="form-row clientIn">
              <input type="checkbox" name="onClientBox" value="" id="client" class="">
              <label for="client">Client Information</label>
          </div>

          <div class="form-row d-flex clientInfo">
            <div class="inputBox">
              <input type="text" name="clientID" value="<?= $order['client_id'] ?>" class="form-controll" placeholder="client ID">
            </div>
            <div class="inputBox password">
              <input type="text" name="clientPassword" value="<?= $order['client_password'] ?>" class="form-controll" placeholder="enter password">
            </div>
          </div>

          <div class="form-row">
            <div class="inputBox">
              <input type="text" name="platform" value="<?= $order['platform_name'] ?>" class="form-controll" placeholder="plartform name">
            </div>
          </div>

          <div class="form-group text-center">
            <button type="submit" class="bttn" name="buttonUpdate">update order</button>
          </div>

        </form>
      </div>


    <script src="../assets/script.js" charset="utf-8"></script>
  </body>
</html>

<?php

  require('../config/db.php');

  $orderId = rand(1524, 99999);

  if (!empty('$_POST')) {
    $details = $_POST['details'];
    $date = $_POST['date'];
    $c_name = $_POST['clientName'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $c_id = $_POST['clientID'];
    $c_pass = $_POST['clientPassword'];
    $platform = $_POST['platform'];
    $created_at = date('y-m-d, H:i:s');

    $insert = "INSERT INTO orders(contract_ID, contract_Details, contract_date, client, type, amount, status, client_id, client_password, platform_name, created_at)
    VALUES('$orderId', '$details', '$date', '$c_name', '$type', '$amount', '$status', '$c_id', '$c_pass', '$platform', '$created_at')
    ";

    $order = mysqli_query($conn, $insert);

    if($order){
      echo 'order created';
      header('Location: ../dashboard/orders.php');
    }else{
      echo "order created unsuccessfull";
    }
  }

?>

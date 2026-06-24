<?php

  require('../config/db.php');

  $orderId = $conn->real_escape_string($_GET['id']);
  $delete = "DELETE FROM orders WHERE  id = ?";
  $stm = $conn->prepare($delete);
  $stm->bind_param("d", $orderId);
  $stm->execute();

  if($conn->real_escape_string('$stm')){
    echo "Deleted";
    header("Location: ../dashboard/orders.php");
  }else{
    echo "Deleted Unsuccessfull";
    header("Location: ../dashboard/orders.php");
  }

?>

<?php 
    ob_start();
    session_start();
    ob_end_clean();

    include("../config/config.php");
    include("../classes/database.php");
    include("../classes/order.php");

    $orderobj = new order(true);
    $orderobj->saveorder($_SESSION["customer_id"],$_POST["address"],$_POST["city"],$_POST["country"],$_POST["email"],$_POST["phone"],$_POST["total_price"]);
    //echo $orderobj->$_SESSION["customer_id"];
    //exit();
    unset($_SESSION["cart"]);
    unset($_SESSION["customer_id"]);
    unset($_SESSION["customer_name"]);

    session_destroy();

    header("location:../index.php?ordersuccess");

 ?>
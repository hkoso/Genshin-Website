<?php

    require_once '../databaseLoginInfo.php';
    session_start(); 
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else {
        header("Location: http://localhost:8000/401.html");
    }


    if(isset($_SESSION['currentOrderId'])) {
        $orderId = $_SESSION['currentOrderId'];
    }
    else {
        header("Location: http://localhost:8000/404.html");
    }


    $conn = new mysqli($url, $un, $pwd, $db);

    if($conn -> connect_errno) {
        die($conn -> connect_errno);
    }


    $sql = "DELETE
            FROM
                user_order
            WHERE
                order_id = $orderId;";

    $result = $conn->query($sql);

    $sql = "DELETE
            FROM
                order_deliver_address
            WHERE
                order_id = $orderId;";

    $result = $conn->query($sql);

    $sql = "DELETE
            FROM
                order_contact_info
            WHERE
                order_id = $orderId;";
    
    $result = $conn->query($sql);

    $sql = "DELETE
            FROM
                order_info
            WHERE
                order_id = $orderId;";

    $result = $conn->query($sql);

    header("Location: http://localhost:8000/200.html");
?>
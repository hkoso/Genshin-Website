<?php
     session_start();
     $username = $_SESSION['username'];

     require_once '../databaseLoginInfo.php';

     $dishName = $_POST['dish_name'];
     $quantity = $_POST[$dishName];

     $conn = new mysqli($url, $un, $pwd, $db);

    if($conn -> connect_errno) {
        die($conn -> connect_errno);
    }

    $sql = "SELECT order_id
            FROM user_order 
            WHERE order_status = -1 AND username = '$username';";

    $orderResult = $conn->query($sql);

    if (mysqli_num_rows($orderResult) == 0) { 
        $sql = "INSERT INTO user_order(username, order_status)
                VALUES('$username', -1);";
                
        $insertResult = $conn->query($sql);

        $sql = "SELECT order_id
                FROM user_order
                WHERE order_status = -1 AND username = '$username';";

        $orderResult = $conn->query($sql);
        $orderId = $orderResult->fetch_array(MYSQLI_NUM)[0];

        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $hour = date('h');
        $minute = date('i');
        $second = date('s');
        $meridiem = strtoupper(date('a'));

        $sql = "INSERT INTO time_info(
                order_id,
                year,
                month,
                day,
                hour,
                minute,
                second,
                meridiem
            )
            VALUES(
                '$orderId',
                 '$year',
                 '$month',
                 '$day',
                 '$hour',
                 '$minute',
                 '$second',
                 '$meridiem'
            )";
        $tempResult = $conn->query($sql);
    }
    else {
        
        $orderId = $orderResult->fetch_array(MYSQLI_NUM)[0];
        
    }

    $_SESSION['currentOrderId'] = $orderId;

    $sql = "SELECT dish_name
            FROM order_info
            WHERE order_id = $orderId AND dish_name = '$dishName';";

    $dishResult = $conn->query($sql);

    if (mysqli_num_rows($dishResult) == 0) {

        $sql = "INSERT INTO order_info(order_id, dish_name, quantity)
                VALUES($orderId, '$dishName', $quantity);";
    }

    else {
        $sql = "UPDATE order_info 
                SET quantity = quantity + $quantity 
                WHERE order_id = $orderId AND dish_name = '$dishName';";
        
    }

    $tempResult = $conn->query($sql);
    header("Location: http://localhost:8000/order/cart.php");

?>
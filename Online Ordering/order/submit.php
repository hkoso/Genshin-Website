<?php      

    session_start();
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else {
        header("Location: http://localhost:8000/401.html");
    }

    
    if(isset($_SESSION["currentOrderId"])) {
        $orderId = $_SESSION["currentOrderId"];
    }
    else {
        header("Location: http://localhost:8000/404.html");
    }

    require_once '../databaseLoginInfo.php';
    $conn = new mysqli($url, $un, $pwd, $db);
    
    if($conn -> connect_errno) {
        die($conn -> connect_errno);
    }
    
    
    $sql = "UPDATE user_order
            SET order_status = 0
            WHERE order_id = $orderId;";
        
    $result = $conn->query($sql);

    $_SESSION["currentOrderId"] = null;
    
    header("Location: http://localhost:8000/200.html");
?>
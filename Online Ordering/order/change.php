<?php 
    session_start();
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else {
        header("Location: http://localhost:8000/401.html");
    }

    $orderId = $_SESSION['currentOrderId'];
    require_once '../databaseLoginInfo.php';

    $dishName = $_POST['dishName'];
    $quantity = $_POST['quantity'];

    $conn = new mysqli($url, $un, $pwd, $db);

    if($conn -> connect_errno) {
       die($conn -> connect_errno);
    }

    if($quantity > 0) {
        $sql = "UPDATE order_info
                SET quantity = $quantity
                WHERE order_id = $orderId AND dish_name = '$dishName';";
    }
    else if ($quantity == 0){
        $sql = "DELETE
                FROM order_info
                WHERE dish_name = '$dishName';";
    }

    $result = $conn->query($sql);

    header("Location: http://localhost:8000/order/cart.php");

?>
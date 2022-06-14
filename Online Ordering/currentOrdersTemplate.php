<?php
    session_start(); 
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else {
        header("Location: http://localhost/Online%20Ordering/403.html");
    }

    $orderId = $_POST['id'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Details of Order ID: <?php echo $orderId?>
        </title>
    
        <style>
        * {
        margin: 0em;
        padding: 0em;
        font-family: Arial, Helvetica, sans-serif;
        }

        a { 
            text-decoration: none;
            list-style: none;
            color: rgb(43, 43, 43);
        }

        #display {
            display: grid;
            grid-template-rows: 6em 6em 26em 3em;
            grid-template-columns: 1fr 4fr;
            grid-template-areas:    "header header"
                                    "navigation title"
                                    "navigation info"
                                    "footer footer";
        }

        #pageTitle {
            font-size: 2em;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border-radius: 1em;
            margin: 1em;
            margin-top: 0.4em;
            margin-bottom: 0.6em;
            padding-left: 0.8em;
            padding-top: 0.4em;
            grid-row: 2 / 3;
            grid-column: 2 / -1;
            background-color:  rgb(255, 246, 206);
            display: grid;
            grid-template-rows: 2em;
            grid-template-columns: 1fr 1fr;
        }

        #status{
            margin-right: 1em;
            justify-self: flex-end;
        }

        #mainBar {
            grid-row: 1 / 2;
            grid-column: 1 / -1;
            overflow: hidden;
        }

        #navi{
            background-color: rgb(247, 198, 22);
            overflow: hidden;
        }

        #navi li {
            float: left;
            width: 10em;
            font-size: 1.5em;
            text-align: center;
        }

        #navi #logo {
            width: 10em;
        }

        #navi #container {
            display: flex;
            justify-content: flex-end;    
        }

        #navi #container div {
            padding-top: 2em;
            height: 4em;
            align-items: center;
        }

        #navi #container a:hover {
            background-color: rgb(211, 162, 15);
        }

        #menus {   
            display: flex;
            flex-wrap: nowrap;
            flex-direction: column;
            font-size: 1.5em;
        }

        #menus div {
            padding: 2em 0em;
            width: 100%;
            text-align: center;
        }

        #menuBar {
            grid-row: 2 / 4;
            grid-column: 1 / 2;
            background-color: rgb(223, 212, 173);
        }

        #menuBar a:hover div {
            width: 100%;
            background-color: rgb(109, 103, 81);
        }

            #info {
            grid-row: 3 / 4;
            grid-column: 2 / -1;
            display: flex;
            flex-direction: column;
            overflow: auto;
            margin: 2em;
            margin-top: 1em;
            background-color:  rgb(255, 246, 206);
            border-radius: 2em;

        }

        table {
        width: 100%;
        border-spacing: 1em;
        }

        #title {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            font-size: 1.4em;
        }

        td {
            text-align: center;
            font-size: 1.2em;
        }

        #total th{
            font-size: 1.4em;
            
        }

        
        #footer{
            grid-row: -2 / -1;
            grid-column: 1 / -1;
            background-color: rgb(142, 71, 4);
            color: rgb(211, 211, 211);
            padding-top: 1em;
            text-align: center;
        }



        </style>
    </head>

    <body>
    <div id="display">
        <div id="mainBar">
            <ul id="navi">
                <li><img id="logo" src="../Online Ordering/assets/logo.png" alt="logo"></li>
                <div id="container">
                <a href="../Online Ordering/currentOrders.php"><div><li>Your Orders</li></div></a>
                    <a href="../Online Ordering/choose.html"><div><li>Order Now</li></div></a>
                    <a href="../Online Ordering/logOut.php"><div><li>Log Out</li></div></a>
                </div>
            </ul>
        </div>

        
        <div id="menuBar">
            <ul id="menus">
                <a href="../Online Ordering/currentOrders.php"><div><li>Back</li></div></a>
            </ul>
        </div>

        <div id="pageTitle">
            <?php 
                displayInfo($orderId); 
            ?>
        </div>


        <div id="footer">
            This is a derivative work based on the game Genshin Impact and no commercial usage is allowed.
        </div>
        

        
    </div>

    </body>
</html>

<?php

    
    function displayInfo($orderId) {
        require_once "databaseLoginInfo.php";
        $conn = new mysqli($url, $un, $pwd, $db);

        if($conn->connect_errno){
            die($conn_errno);
        }

        $sql = "SELECT order_status
                FROM user_order
                WHERE order_id = $orderId;";

        $statusResult = $conn->query($sql);
        $status = $statusResult->fetch_array(MYSQLI_NUM)[0];
        $status = translateStatus($status);
        
        echo    '   <div>Order ID: ' . $orderId . '</div>
                    <div id="status">' . $status . '</div>
                 </div>
                 <div id="info">
                    <table>
                    <tr id="title">
                        <th>Qunatity</th>
                        <th>Item</th>
                        <th>Price</th>
                    </tr>';

        $sql = "SELECT
                    order_info.quantity,
                    order_info.dish_name,
                    dish_info.price
                FROM
                    order_info,
                    dish_info
                WHERE
                    order_info.order_id = $orderId 
                    AND 
                    dish_info.dish_name = order_info.dish_name;";

        $orderResults = $conn->query($sql);
        $rowsNum = mysqli_num_rows($orderResults);

        $total = 0;
        for($i = 0; $i < $rowsNum; $i++) {
            $orderResults->data_seek($i);
            $orderRow = $orderResults->fetch_array(MYSQLI_ASSOC);

            echo    '<tr class="purchase">
                        <td class="quantity">' . $orderRow['quantity'] . '</td>
                        <td class="item">' . changeStyle($orderRow['dish_name']) . '</td>
                        <td class="price">' . $orderRow['price'] * $orderRow['quantity']. ' Mora</td>
                    </tr>';
            $total += $orderRow['price'] * $orderRow['quantity'];

            
        }

        echo    '<tr id="total">
                    <th>Total</th>
                    <td></td>
                    <td>' . $total . ' Mora</td>
                 </tr>
                 </table>';
    }

    function translateStatus($status) {
        switch($status) {
            case 0: return "Order Received";
            case 1: return "Cooking";
            case 2: return "Delivering";
            case 3: return "Ready to be Picked in Store";           
        }

    }

    function changeStyle($string) {
        strtoupper($string[0]);
        for($i = 1; $i < strlen($string); $i++){
            if($string[$i] == "_"){
                $string[$i] = " ";
                strtoupper($string[$i + 1]);
            }
        }

        return $string;
    }
?>
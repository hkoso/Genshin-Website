<?php
    session_start(); 
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else {
        header("Location: http://localhost/Online%20Ordering/401.html");
    }
?>

<!DOCTYPE html>
<html>

<head>
<title>Welcome, <?php echo $username?>!</title>

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


    #orders {
        grid-row: 3 / 4;
        grid-column: 2 / -1;
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        overflow: auto;
        align-items: center;
    }

    .content {
        border-radius: 1em;
        background-color: rgb(255, 246, 206);
        font-size: 1.5em;
        
        display: grid;
        grid-template-rows: 2em 2rem 2rem 2rem;
        grid-template-columns: 5fr 1fr;
        grid-template-areas: "info button"
                             "info button"
                             "info button"
                             "info button";
        overflow: hidden;
        
    }

    .link {
        margin: 1em;
        width: 92%;
    }

    h3 {
        margin-left: 1rem;
        margin-top: 1rem;
        grid-row: 1 / 2;
        grid-column: 1 / 2;
    }

    .detail {
        margin-left: 1rem;
        grid-row: 2 / 3;
        grid-column: 1 / 2;
    }

    .total {
        margin-left: 1rem;
        grid-row: 3 / 4;
        grid-column: 1 / 2;
    }

    .time {
        margin-left: 1rem;
        grid-row: 4 / 5;
        grid-column: 1 / 2;
    }

    .button{
        grid-row: 1 / -1;
        grid-column: -2 / -1;
        align-self: center;
        justify-self: center;
        border: 1em;
        border-left-color: black;
        
    }


    input[type=submit] {
        background-color: rgb(255, 246, 206);
        color: rgb(74, 73, 73);
        font-size: 1.1em;
        width: 6em;
        height: 6em;
        border-left-color: rgb(74, 73, 73);
        border-right: 0.5rem;
    }

    input[type=submit]:hover {
        background-color: rgb(211, 162, 15);
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
                <li><img id="logo" src="../../Online Ordering/assets/logo.png" alt="logo"></li>
                <div id="container">
                    <a href="../Online Ordering/currentOrders.php"><div><li>Your Orders</li></div></a>
                    <a href="../Online Ordering/choose.html"><div><li>Order Now</li></div></a>
                    <a href="../Online Ordering/logOut.php"><div><li>Log Out</li></div></a>
                </div>
            </ul>
        </div>

        
        <div id="menuBar">
            <ul id="menus">
                <a href="../Online Ordering/currentOrders.php"><div><li>Orders</li></div></a>
            </ul>
        </div>

        <div id="pageTitle">
            Current Orders
        </div>

        <?php 
            displayOrder($username);
        ?>


        <div id="footer">
            This is a derivative work based on the game Genshin Impact and no commercial usage is allowed.
        </div>

    </div>

</body>
</html>

<?php 
    function displayOrder($username) {
        require_once 'databaseLoginInfo.php';
        $conn = new mysqli($url, $un, $pwd, $db);

        if($conn -> connect_errno) {
            die($conn_errno);
        }

        $sql = "SELECT order_id 
                FROM user_order
                WHERE username = '$username';";
        
        $orderResult = $conn->query($sql);
        $orderNum = mysqli_num_rows($orderResult);

        if($orderNum == 0){
            echo <<<_END

            _END;
        }
        else {
            echo "<div id='orders'>";
            for($i = 0; $i < $orderNum; $i++){

                $orderResult->data_seek($i);
                $orderIds = $orderResult->fetch_array(MYSQLI_NUM);
                $orderId = $orderIds[0];

                echo '<form action="currentOrdersTemplate.php" method="POST" class="link">
                        <input type="hidden" name="id" value="' . $orderId . '">
                            <div class="content">';



                echo "<h3>Order ID: " . $orderId . "</h3>"; 

                $sql = "SELECT dish_name
                        FROM order_info
                        WHERE order_id = '$orderId';";

                $dishResult = $conn->query($sql);
                $dishNum = mysqli_num_rows($dishResult);


                $total = 0;
                if($dishNum == 1){
                    echo "<div class='detail'>" . $dishNum . " item</div>";
                }
                else {
                    echo "<div class='detail'>" . $dishNum . " items</div>";
                }

                for($j = 0; $j < $dishNum; $j++){
                    $dishResult->data_seek($j);
                    $dishRows = $dishResult->fetch_array(MYSQLI_ASSOC);
                    $dishName = $dishRows["dish_name"];
                    
                    
                    $sql = "SELECT price
                            FROM dish_info
                            WHERE dish_name = '$dishName';";
                    
                    $priceResult = $conn->query($sql);
                    $price = $priceResult->fetch_array(MYSQLI_NUM);
                    $total += $price[0];

                }

                $sql = "SELECT year, month, day, hour, minute, second, meridiem
                        FROM time_info
                        WHERE order_id = '$orderId';";
                
                $timeResult = $conn->query($sql);
                $times = $timeResult->fetch_array();

                $time = $times['year'] . "-" . $times['month'] . "-" . 
                         $times['day'] . " " . $times['hour'] . ":" . 
                         $times['minute'] . ":" . $times['second'] . " " .
                         $times['meridiem']; 

                echo "          <div class='total'>" . $total . " Mora</div>
                                <div class='time'>Order Time: " . $time . "</div>
                                <div class='button'><input type='submit' value='>' id='submit'>
                            </div>
                        </div>
                    </form>";

            }
            echo "</div>";
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
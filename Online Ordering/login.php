<html>

<head>

    <title>haha</title>

</head>

<body>
    <?php

    require_once 'databaseLoginInfo.php';
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $conn = new mysqli($url, $un, $pwd, $db);

    if($conn -> connect_errno) {
        die($conn -> connect_errno);
    }

    $sql = "SELECT username, password FROM user_info
            Where username = '$inputUsername'
            AND password = '$inputPassword'";

    $result = $conn->query($sql);
    if(mysqli_num_rows($result) != 1) { 
        echo "Wrong password or username. Try again!";
    }
    else {
        session_start();
        $_SESSION["username"] = $inputUsername;
        $_SESSION["database"] = $db; 

        header("Location: http://localhost/Online%20Ordering/currentOrders.php");

    }


    ?>

</body>
</html>
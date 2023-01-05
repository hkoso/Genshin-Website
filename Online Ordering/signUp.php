<html>

<head>

    <title>Hurry</title>

</head>

<body>
    <?php

    require_once 'databaseLoginInfo.php';

    $conn = new mysqli($url, $un, $pwd, $db);

    if($conn -> connect_errno) {
        die($conn -> connect_errno);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $sql =  "SELECT username FROM user_info
             WHERE username = '$username'";

    $result = $conn->query($sql);

    if(mysqli_num_rows($result) > 0) {
        echo "username occupied";
    }
    else {
        $sql =  "INSERT INTO user_info (username, password, permission_level)
                 VALUES ('$username', '$password' , 1)";
        $result = $conn->query($sql);
        echo "success!";
    }
    ?>

</body>
</html>
<?php 
    session_start();
    session_destroy();
    header("Location: http://localhost/Online%20Ordering/logOutPage.html");
?>
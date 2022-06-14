<!DOCTYPE html>
<html>
    <head>
        <title>Order Cancelled</title>
        <meta charset="utf-8">

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

            #picture {
               position: absolute;
               top: 1em;
               left: 13em;

            }

            #picture img {
                height: 26em;
                border-radius: 1em;
            }

            #info {
                position: absolute;
                top: 8em;
                right: 3em;
                border-radius: 1em;
                padding: 5em;
                background-color: rgb(255, 246, 206);
            }

            h2 {
                font-size: 2em;
            }
            
            #footer{
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: rgb(142, 71, 4);
                color: rgb(211, 211, 211);
                padding-top: 1em;
                padding-bottom: 1em;
                text-align: center;
                overflow: hidden;
            }


        </style>
    </head>

    <body>
        <div id="display">
            <div id="picture"><img src="../Online Ordering/assets/orderCancelled.jpg" alt="order cancelled"></div>
            <div id="info"><h2>Order Cancelled</h2>
                <br> 
                <div id="text">
                    Guoba has cancelled your current order. You can start new order at any time!
                    <br> You will be redirected to homepage shortly.
                </div>
            </div>

            <div id="footer">
                This is a derivative work based on the game Genshin Impact and no commercial usage is allowed.
            </div>
        </div>

    </body>
</html>

<?php
    session_start(); 
    if(isset($_SESSION["username"])) {
        header('Refresh: 8; URL=http://localhost/Online%20Ordering/currentOrders.php');
    }
    else {
        header('Refresh: 8; URL=http://localhost/Online%20Ordering/index.html');
    }
    
?>

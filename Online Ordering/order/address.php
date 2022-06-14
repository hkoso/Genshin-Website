<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Deliver Info</title>

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

    li {
        list-style: none;
    }

    #display {
        display: grid;
        grid-template-rows: 6em 28em 4em;
        grid-template-columns: 1fr 2fr 1fr;
        grid-template-areas:    "link link link"
                                "blank form blank"
                                "footer footer footer";
    }

    #mainBar {
        grid-row: 1 / 2;
        grid-column: 1 / -1;
        overflow: hidden;
    }

    #navi {
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
        height: 5em;
        align-items: center;
    }

    #navi #container a:hover {
        background-color: rgb(211, 162, 15);
    }

    #menus {   
        display: flex;
        flex-wrap: nowrap;
        flex-direction: column;   
        align-items: center;
        margin: 1em;
        border-radius: 0.5em;
        font-size: 1.5em;
        background-color: rgb(223, 212, 173);
    }

    #menus li {
        padding: 1em 2em;
        width: 6em;
    }

    #menuBar a {
        align-items: center;
    }

    #menuBar {
        grid-template-rows: 2 / 3;
        grid-template-columns: 1 / 2;
    }

    #menuBar a:hover div {
        background-color: rgb(109, 103, 81);
    }
        
    #footer{
        grid-row: -2 / -1;
        grid-column: 1 / -1;
        background-color: rgb(142, 71, 4);
        color: rgb(211, 211, 211);
        padding-top: 1em;
        text-align: center;
    }

    #input {
        grid-row: 2 / 3;
        grid-column: 2 / 3;
        background-color: rgb(255, 215, 69);
        margin: 2em;
        border-radius: 1em;
        display: flex;
        flex-direction: column;
    }

    #radios {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    form {
        position: relative;
        left: 1em;
        top: 1em;
    }

    form div {
        margin: 0.5em;
    }

    form .label {
        margin: 0, 1em;
    }

    #title {
        font-size: 1.5em;
    }

    #specificAddress {
        margin-left: 1em;
    }

    #generalAddress {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    input, select {
        height: 3em;
    }

    #name {
        margin-left: 1em;
    }
    
    #suit {
        width: 3em;
    }

    #streetName {
        width: 21.5em;
    }

    #postalCode {
        width: 6em;
    }

    #city {
        width: 8em
    }

    #phoneNum {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    input[type=submit] {
        float: right;
        margin-right: 4em;
        border-radius: 1em;
        border-width: 0;
        cursor: pointer;
        width: 6rem;
        height: 3rem;
        font-size: 1rem;
    }

    #back {
        float: left;
        margin-left: 2rem;
        border-radius: 1em;
        border-width: 0;
        cursor: pointer;
        width: 6rem;
        height: 3rem;
        font-size: 1rem;
    }

    </style>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
            $("#dineIn").click(function() {
                $(".address").prop("disabled", true);
            });
        });

        $(document).ready(function() {
            $("#takeOut").click(function() {
                $(".address").prop("disabled", false);
            });
        });

        $(document).ready(function() {
            $("#back").click(function() {
                window.location.href="http://localhost/Online%20Ordering/order/cart.php";
            });
        });
    </script>

</head>


<body>
    <div id="display">

        <!--Navigation Bar--->
        <div id="mainBar">
            <ul id="navi">
                <li><img id="logo" src="../../Online Ordering/assets/logo.png" alt="logo"></li>
                <div id="container">
                    <a href="../currentOrders.php"><div><li>Your Orders</li></div></a>
                    <a href="../choose.html"><div><li>Order Now</li></div></a>
                    <a href="../logOut.php"><div><li>Log Out</li></div></a>
                </div>
            </ul>
        </div>

        <div id="input">
            <form action="confirmation.php" method="POST">
                
                <div id="choose">
                    <div id="title">Select Service Mode</div>
                    <div id="radios">
                        <input type="radio" name="serviceMode" value="0" id="dineIn">
                        <div class="label">Dine in</div>
                        <input type="radio" name="serviceMode" value="1" id="takeOut">
                        <div class="label">Take out</label></div>
                    </div>
                </div>

                <div id="name">
                    First Name <input type="text" name="firstName" id="firstName">
                    Last Name <input type="text" name="lastName" id="lastName">
                </div>

                <div id="specificAddress">
                    Suit NO. <input type="text" name="suit" class="address" id="suit">
                    Street Name <input type="text" name="street" class="address" id="streetName">
                </div>
                
                <div id="generalAddress">
                    <div class="label">City</div>
                    <input type="text" name="city" class="address" id="city">
                    <div class="label">Country</div>
                    <select name="country" class="address" id="country">
                        <option value="Mondstadt">Mondstadt</option>
                        <option value="Liyue">Liyue</option>
                        <option value="Inazuma">Inazuma</option>
                        <option value="Sumeru">Sumeru</option>
                        <option value="Fontaine">Fontaine</option>
                        <option value="Natlan">Natlan</option>
                        <option value="Snezhnaya">Snezhnaya</option>
                    </select>   
                    <div class="label">Postal Code</div>
                    <input type="text" name="postalCode" class="address" id="postalCode">
                </div>
                <div id="phoneNum">
                    <div class="label">Phone Number</div>
                    <input type="tel" name="phoneNum" placeholder="Format: 123-456-7890">
                </div>
                <input type="button" id="back" value="back">
                <input type="submit">
            </form>
        </div>

        <div id="footer">
            This is a derivative work based on the game Genshin Impact and no commercial usage is allowed.
        </div>

    </body>

</html>
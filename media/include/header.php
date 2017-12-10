<?php
    session_start();
    if(!isset($_SESSION["cartData"])){
        $_SESSION["cartData"] = [];
    }
    /* for wamp remove the comment of following code for base path*/

    // define("BASE_PATH",$_SERVER['DOCUMENT_ROOT'].'/pizza/'); 
    
    // var_dump(BASE_PATH);

    define("BASE_PATH",'http://localhost/pizza/');  
?>
<head>
    <title>Ab's Pizza</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_PATH;?>/media/lib/jquery-3.2.1.min.js"></script>
</head>
    <body>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_PATH;?>/media/css/home.css"></link>   
        <div class="main-header">
            <ul>
                <li><a class="active glyphicon glyphicon-home" href="<?php echo BASE_PATH;?>index.php"> <span class="menu-text">Home</span></a></li>
                <li><a class="glyphicon glyphicon-list-alt"href="<?php echo BASE_PATH;?>menu/index.php"> <span class="menu-text">Menu</span></a></li>
                <!-- <li><a href="">Contact</a></li>
                <li><a href="">About</a></li> -->
                <li class="cart"><a class="glyphicon glyphicon-shopping-cart" href="<?php echo BASE_PATH;?>cart/index.php"> <span class="menu-text">Cart<span id="count_cart" class="badge"></span></span></a></li>
            </ul>
        </div>
        
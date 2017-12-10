<?php
    session_start();
    if(!isset($_SESSION["cartData"])){
        $_SESSION["cartData"] = [];
    }
    if(isset($_POST['AddOrder'])){
        $pizzaList = file_get_contents('pizzaList.json');
        $pizzaList = json_decode($pizzaList,true);
        foreach($pizzaList as $pizza){
            if($pizza['pizzaName'] == $_POST['pizzaName']){
            
                array_push($_SESSION["cartData"],$pizza);
                echo count($_SESSION["cartData"]);
                break;
            }
        }
    }
    if(isset($_POST['OrederPizza'])){
        addToOrder();
    }
    if(isset($_POST['clearCart'])){
        unset($_SESSION["cartData"]);
    }
    function addToOrder(){
        $filename = 'pizzaOrder.json';
        $pizzaOrder['pizza'] = $_SESSION["cartData"];
        if (file_exists($filename)) {
            $file = fopen('pizzaOrder.json', "a");
            $json = json_decode(file_get_contents('pizzaOrder.json'), true);
            if($json === null){
                $json = [];
            }
        }
        else{
            $file = fopen('pizzaOrder.json', "w");
            $json = [];

        }
        

        $pizzaOrder['totalBill'] =  $_SESSION["totalBill"];
        $pizzaOrder['name'] = $_POST["name"];
        $pizzaOrder['number'] = $_POST["number"];
        $pizzaOrder['Address'] = $_POST["address"];
        
        array_push($json,$pizzaOrder);

        file_put_contents('pizzaOrder.json', json_encode( $json, JSON_PRETTY_PRINT));
        unset($_SESSION["cartData"]);
        fclose($file);
    }
?>
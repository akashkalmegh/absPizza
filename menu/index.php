<?php require_once $_SERVER['DOCUMENT_ROOT']."/pizza/media/include/header.php"; ?>

<script src="<?php echo BASE_PATH;?>/media/js/menu.js"></script>
<br><br><br>
<div id="pizza_details">
    <?php
        $pizzaList = file_get_contents('../controller/pizzaList.json');
        $pizzaList = json_decode($pizzaList,true);
        foreach($pizzaList as $pizza){
            ?>
            <div id="<?php echo $pizza['pizzaName'];?>" class="pizza-container">
                <div class="pizza-img">
                    <img src="<?php echo BASE_PATH;?>media/images/pizza-img/<?php echo $pizza['pizzaName'];?>.png"/>
            
                </div>
                <div class="pizza-details">
                    <h4>
                        <?php echo $pizza['pizzaName']; ?>
                    </h4>
                    <lable>Ingredients : <?php echo $pizza['pizzaIngredients']; ?><lable>
                    <lable><?php echo $pizza['pizzaType']; ?><lable><br>
                    <lable>Price : <?php echo $pizza['pizzaPrice']; ?><lable><br>
                        <button id="<?php echo $pizza['pizzaName']; ?>" onclick="loadPizzaTOCart('<?php echo $pizza['pizzaName']; ?>')" class="btn-add-cart">Add To Cart</button>
                </div>
        </div>
            <?php
        }
    ?>
</div>
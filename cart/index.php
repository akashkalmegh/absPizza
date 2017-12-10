<?php require_once $_SERVER['DOCUMENT_ROOT']."/pizza/media/include/header.php"; ?>
<script src="<?php echo BASE_PATH;?>/media/js/cart.js"></script>
<!-- <div>
    <img src="../media/images/banner/i1.jpg" alt="50%" class="discount-banner">
</div> -->
<br><br><br>

<button id="empty_btn" class="empty-btn" onclick="emptyCart();">Empty Cart</button>       
<br><br>                
<div class="summary-box">
    <div class="cart-head"> <h2>Your Cart</h3>
    </div>
    <div class="cart-details">
        <table class="cart-table">
        <colgroup>
            <col width="70%">
            <col width="30%">
        </colgroup>
            <thead>
                <tr>
                    <th>Pizza
                    </th>
                    <th>Price
                    </th>
                </tr>
            </thead>
        <?php 
             $_SESSION["totalBill"] = 0;
            foreach($_SESSION['cartData'] as $pizza){
               
                ?>
                <tr>
                    <td><?php echo $pizza['pizzaName'];?>
                    </td>
                    <td><?php echo $pizza['pizzaPrice'];?>
                    </td>
                </tr>
                <?php
                $_SESSION["totalBill"] = $_SESSION["totalBill"] + $pizza['pizzaPrice'];
            }
        ?>
        <tr class="bill-tr">
            <td>Total Bill</td>
            <td><?php echo $_SESSION["totalBill"];?></td>
        </tr>
        <?php 
            if(count($_SESSION['cartData']) > 1)
            {
                ?>
                    <tr>
                        <td>Discount 20%
                        </td>
                        <td>
                        <?php 
                                $temp = ($_SESSION["totalBill"]*20)/100;
                                echo "- ".$temp;
                                $_SESSION["totalBill"] = $_SESSION["totalBill"] - $temp;
                        ?>
                        </td>
                    </tr>
                    <tr class="bill-tr">
                        <td> 
                        </td>
                        <td>
                        <?php 
                                echo $_SESSION["totalBill"];
                        ?>
                        </td>
                    </tr>
                <?php
            }
        ?>

        </table>
        <table class="cart-table">
        <colgroup>
            <col width="50%">
            <col width="50%">
        </colgroup>
        <tr>
            <td>
                <button id="btn-plc-order" class="btn-add-cart btn-cart" onclick="placeOrderFormPopp();">Place Order</button>
            </td>
            <td>
            <a href="<?php echo BASE_PATH;?>menu/index.php"> 
                <button id="btn-add-more-pizza" class="btn-add-cart btn-cart">Add More Pizza</button></a>
            </td>
        </table>
        <?php
        ?>
    </div>
</div>

<div id="orderPopup" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
        <div id="msg_body"> 
            <table class="msg-body-table">
                <colgroup>
                    <col width="35%">
                    <col width="75%">
                </colgroup>
                <tr>
                    <td><b>Name :</b>
                    </td>
                    <td>
                        <input type="text" id="name" name="name">
                    </td>
                </tr>
                <tr>
                    <td><b>Mobile Number :</b>
                    </td>
                    <td>
                        <input type="number" id="number" name="number" min="10" max="10">
                    </td>
                </tr>
                <tr>
                    <td><b>Address :</b>
                    </td>
                    <td>
                        <textarea name="Address" id="Address" cols="30" rows="10"></textarea>
                    </td>
                </tr>
            </table>
            <br>
            <table class="msg-body-table">
            <colgroup>
                <col width="50%">
                <col width="50%">
            </colgroup>
            <tr>
                <td id="wrgMsg"class="wrg-msg">Please  Enter All Data*</td>
            </tr>
            <tr>
                <td>
                    <button id="close-btn" class="btn-add-cart btn-cart" style="width:50%;margin-left:75px" onclick="closePopup();">Close</button>
                </td>
                <td>
                    <button id="close-btn" class="btn-add-cart btn-cart" style="width:50%;margin-left:75px" onclick="verifyAndOrder();">Order</button>       
                </td>
        </tr>    
            </table>
        </div>
    </div>

</div>


<?php if(count($_SESSION['cartData'])==0 || (!isset($_SESSION['cartData'])))
        {
            ?><script>
                disablePlcOrder();
            </script><?php
        }
?>
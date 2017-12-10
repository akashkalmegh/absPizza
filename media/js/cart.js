function placeOrderFormPopp(){
    $("#orderPopup").css("display","block");
}
function closePopup(){
    $("#orderPopup").css("display","none");
}
function verifyAndOrder(){
    var name = $("#name").val();
    var number = $("#number").val();
    var address = $("#Address").val();
    if(name !== "" && number !== "" && number.length == 10 && address !== ""){
        $.ajax({
            url : "../controller/menu_opr.php",
            type: 'POST',
            data : {OrederPizza:1,name:name,number:number,address:address},
            success: function(response){
                console.log(response);
                loadFinalPopup();
                
            },
            error: function(response){
                console.log(response);
            },
    
        });
    }
    else{
        $("#wrgMsg").css("display","block");
    }
    
}

function disablePlcOrder(){
    $("#btn-plc-order").attr("disabled",true);
}
function loadFinalPopup(){
    $(".modal-content").css("width","50%");
    $("#msg_body").html("<div class='final-popup'><p class='final-popup-p'>Your order will be delivered in 30 minutes</p><br><br><br><button onclick='jumpToHome();' class='btn-add-cart btn-cart final-popup-button'>OK</button> </div>"); 
}
function jumpToHome()
{
    window.location.href = "../index.php";
}
function emptyCart(){
    $.ajax({
        url : "../controller/menu_opr.php",
        type: 'POST',
        data : {clearCart:1},
        success: function(response){
            window.location.href = "../menu/index.php";
        },
        error: function(response){
            console.log(response);
        },

    });
}
function loadPizzaTOCart (pizzaName){
    $.ajax({
        url : "../controller/menu_opr.php",
        type: 'POST',
        data : {AddOrder:1,pizzaName:pizzaName},
        success: function(response){
            console.log(response);
            $("#count_cart").html(response);
        },
        error: function(response){
            console.log(response);
        },

    });

}


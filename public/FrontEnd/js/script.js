$(document).ready(function(){
    
    // Chỉnh sửa số lượng
    var input_amount = $('#input_amount').val();
    $('#icon_minus').click(function(e){
        if(input_amount == 1) 
                input_amount = 1; 
            else 
                input_amount--;
        $('#input_amount').val(input_amount);
        e.preventDefault();
    })

    $('#icon_plus').click(function(e){
        input_amount++;
        $('#input_amount').val(input_amount);
        e.preventDefault();
    })

    // // -----MESSAGE----- 

    $("body").click(function(){
        $("#message").hide("slow");
    });

    // // -----NOTIFICATION----- 
    $("#notification").click(function(){
        $("#notification-list").fadeToggle(500);
        $("#user-list").hide(500);
    });

     // // -----USER----- 
     $("#user").click(function(){
        $("#user-list").fadeToggle(500);
        $("#notification-list").hide(500);

    });

    // -----------Store--------

    // Trademark
});
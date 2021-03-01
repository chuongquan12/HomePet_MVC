$(document).ready(function(){
    
    // Chỉnh sửa số lượng
    var input_amount = $('#input_amount').val();
    $('#icon_minus').click(function(e){
        if(input_amount == 0) 
                input_amount = 0; 
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
    // -----------Store--------

    // Trademark
});
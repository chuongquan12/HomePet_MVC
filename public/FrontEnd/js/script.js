$(document).ready(function () {
    // Chỉnh sửa số lượng
    var input_amount = $("#input_amount").val();
    $("#icon_minus").click(function (e) {
        if (input_amount == 1) input_amount = 1;
        else input_amount--;
        $("#input_amount").val(input_amount);
        e.preventDefault();
    });

    $("#icon_plus").click(function (e) {
        const max_input = Number($("#input_amount").attr("max"));
        const val_input = Number($("#input_amount").val());
        if (val_input >= max_input) {
            $("#input_amount").val(input_amount);
            e.preventDefault();
        } else {
            input_amount++;
            $("#input_amount").val(input_amount);
            e.preventDefault();
        }
    });

    $("#input_amount").blur(function (e) {
        const val_input = Number($("#input_amount").val());
        const max_input = Number($("#input_amount").attr("max"));

        if (val_input > max_input) {
            input_amount = max_input;
        } else {
            input_amount = val_input;
        }
        $("#input_amount").attr("value", input_amount);
        $("#input_amount").val(input_amount);

        console.log($("#input_amount").attr("value"));
    });

    // // -----MESSAGE-----

    $("body").click(function () {
        $("#message").hide("slow");
    });

    // // -----NOTIFICATION-----
    $("#notification").click(function () {
        $("#notification-list").fadeToggle(500);
        $("#user-list").hide(500);
    });

    // // -----USER-----
    $("#user").click(function () {
        $("#user-list").fadeToggle(500);
        $("#notification-list").hide(500);
    });

    // -----------Store--------

    // Trademark

    // voice search
    $("#voice-search").click(function (e) {
        e.preventDefault();

        if (window.hasOwnProperty("webkitSpeechRecognition")) {
            // Tạo một phiên bản SpeechRecognition mới
            var recognition = new webkitSpeechRecognition();
            //Kiểm soát xem các kết quả liên tục được trả về cho mỗi lần ghi nhận hay chỉ một kết quả duy nhất. Mặc định là đơn
            recognition.continuous = false;
            //Kiểm soát xem kết quả tạm thời có được trả về ( true) hay không ( false.) Kết quả tạm thời chưa phải là kết quả  cuối cùng
            recognition.interimResults = false;

            recognition.lang = "vi-VN";
            recognition.start();
            //Để xử lý kết quả nhận được sau khi start hay stop thì chúng ta có thể sử dụng event sau :
            recognition.onresult = function (e) {
                $("#transcript").val(e.results[0][0].transcript);
                //Dừng dịch vụ nhận dạng giọng nói nghe âm thanh đến và cố gắng trả lại
                recognition.stop();
            };
            //sự kiện khi xảy Phát sinh khi xảy ra lỗi nhận dạng giọng nói.
            recognition.onerror = function (e) {
                recognition.stop();
            };
        }
    });
});

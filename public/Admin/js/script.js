$(document).ready(function(){
    // // -----DANH SÁCH THƯƠNG HIỆU----- 

    // // Click vào danh sách thương hiệu 

    $("#revenue").click(function(){
        $(".revenue").fadeToggle(500);

    });
   

    // // -----DANH SÁCH ĐƠN HÀNG----- 

    // Click vào danh sách đơn hàng
    $("#list-order").click(function(){
        $(".order").fadeToggle(500);
    });


    // // -----DANH SÁCH NHÂN VIÊN----- 

    // // Click vào danh sách nhân viên
    $("#list-personnel").click(function(){
        $(".personnel").fadeToggle(500);
    });

    $("#sub-personnel-edit").click(function() {
        $("#tb-list").load("list-personnel.php");
    });

    // // -----DANH SÁCH VẬT NUÔI----- 

    // // Click vào danh sách vật nuôi 
    $("#list-product-type-1").click(function(){
        $(".product-type-1").fadeToggle(500);
       
    
    });

    // // -----DANH SÁCH LOẠI SẢN PHẨM----- 

    // // Click vào danh sách loại sản phẩm 
    $("#list-product-type-2").click(function(){
        $(".product-type-2").fadeToggle(500);
        
    });

    // // -----DANH SÁCH THƯƠNG HIỆU----- 

    // // Click vào danh sách thương hiệu 

    $("#list-trademark").click(function(){
        $(".trademark").fadeToggle(500);

    });
   
    // // -----DANH SÁCH SẢN PHẨM----- 

    // // Click vào danh sách sản phẩm
    $("#list-product").click(function(){
        $(".product").fadeToggle(500);
        
    });

    $("#list-image").click(function () { 
        $(".image").fadeToggle(500);
    });

    // // -----MESSAGE----- 
    $("#body").click(function(){
        $("#message").hide("slow");

    });

    // // -----NOTIFICATION----- 
    $("#notification").click(function(){
        $("#notification-list").fadeToggle(500);
    });

    // Biểu đồ ngày

    var order = $('#myChart').data('order');
    var listOfValue = [];
    var listOfDay = [];
    order.forEach(function(element){
        listOfDay.push(element.Ngay);
        listOfValue.push(element.TongDoanhSo);
    });
    console.log(listOfDay);
    console.log(listOfValue);
    listOfDay.forEach(function(element){
        console.log(element);
    });
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: listOfDay,
            datasets: [{
                label: 'Doanh thu',
                backgroundColor: '#8EE5EE',
                borderColor: '#7AC5CD',
                data: listOfValue
            }]
        },

        // Configuration options go here
        options: {}
    });
  });
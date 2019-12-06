$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
        const text = $("#category").val();
        $.ajax({
            url: '../api/api-category.php',
            type: 'get',
            data: {categoria: text},
            success: function(code){
                $("#info-alert").hide().html(code).fadeIn(1000);
            }
        });
    });
});
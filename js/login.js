$(document).ready(function(){
    $("form").submit(function() {
        const username_email = $("#username-email").val().trim();
        const password = $("#password").val().trim();
        if(username_email != "" && password != "") {
            $.ajax({
                url: '../'
            });
        } else {
            $("#form-div").append("Campi sbagliati");
        }
    });
});
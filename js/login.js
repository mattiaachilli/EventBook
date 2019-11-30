$(document).ready(function(){
    $("#msg").hide();
    $("#form-login").submit(function(event) {
        event.preventDefault();
        const username_email = $("#username-email").val().trim();
        const password = $("#password").val().trim();
        if(username_email != "" && password != "") {
            $.ajax({
                url: '../api/api-login.php',
                type: 'post',
                data: {username: username_email, password: password},
                success: function(code) {
                    if (code == 0) {
                        $("#msg").html("Username/Email o Password incorretti");
                        $("#msg").fadeIn(1000);
                        $("#msg").css("font-size", "10px");
                        $("#msg").css("color", "white");
                    } else {
                        document.location.href = "index.php";
                    }
                }
            });
        } else {
            $("#msg").html("Campi non compilati");
            $("#msg").fadeIn(1000);
            $("#msg").css("font-size", "10px");
            $("#msg").css("color", "white");
        }
    });
});
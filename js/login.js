$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
        const username_email = $("#username-email").val().trim();
        const password = $("#password").val().trim();
        if(username_email != "" && password != "") {
            $.ajax({
                url: '../api/api-login.php',
                type: 'post',
                data: {username: username_email, password: password},
                success: function(code) {
                    let msg = "";
                    if (code == 0) {
                        msg = "Username/Email o Password incorretti";
                    } else {
                        msg ="OK"
                    }
                    alert(msg);
                }
            });
        } else {
            $("#form-div").append("Campi non compilati");
        }
    });
});
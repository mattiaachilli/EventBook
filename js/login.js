$(document).ready(function(){
    $("#msg").hide();
    $("#form-login").submit(function(event) {
        event.preventDefault();
        const username_email = $("#username-email").val().trim();
        const password = $("#password").val().trim();
        const checkbox = $("#checkbox").is(":checked")? 1 : 0;
        console.log(checkbox);
        if(username_email != "" && password != "") {
            $.ajax({
                url: '../api/api-login.php',
                type: 'post',
                data: {username: username_email, password: password, checkbox: checkbox},
                success: function(code) {
                    if (code == 0) {
                        $("#msg").html("Username/Email o Password incorretti");
                    } else {
                        document.location.href = "index.php";
                    }
                }
            });
        } else {
            $("#msg").html("Compilare tutti i campi!");
        }
        $("#msg").fadeIn(1000);
    });
});
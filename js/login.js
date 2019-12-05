$(document).ready(function(){
    $("#msg").hide();
    $("#form-login").submit(function(event) {
        event.preventDefault();
        const username_email = $("#username-email").val().trim();
        const password = md5($("#password").val().trim());
        const checkbox = $("#checkbox").is(":checked")? 1 : 0;
        if(username_email != "" && password != "") {
            $.ajax({
                url: '../api/api-login.php',
                type: 'post',
                data: {username: username_email, password: password, checkbox: checkbox},
                success: function(code) {     
                    console.log(code);      
                    if (code == 0) {
                        $("#msg").html("Username/Email o Password incorretti");
                    } else if (code == 1) { /* Normal user */
                        document.location.href = "index.php";
                    } else if(code == 2) { /* Oganizer */
                        document.location.href = "newEvent.php";
                    } else if (code == 3) { /* Administrator */
                        document.location.href = "adminApprovazione.php";
                    }
                }
            });
        } else {
            $("#msg").html("Compilare tutti i campi!");
        }
        $("#msg").fadeIn(1000);
    });
});
$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();

        const new_password = $("#new-password").val();
        const repeat_password = $("#repeat-password").val();
        const pattern = /^(?=.*[a-z])(?=.*\d).{6,20}$/;
        let msg = "";

        $("#info-alert").hide();
        if (new_password.match(pattern)) {
            if (new_password == repeat_password) {
                $.ajax({
                    url: '../api/api-changePassword.php',
                    type: 'post',
                    data: { newPassword: new_password, repeatPassword: repeat_password },
                    success: function(code) {
                        let msg = "";
                        if (code == 1) {
                            msg = "Cambio password avvenuto con successo!";
                        }
                        $("#info-alert").text(msg);
                        $("#info-alert").fadeIn();
                    }
                });
            } else {
                msg = "Le password non corrispondono, riprova!";
            } 
        } else {
            msg = "La password deve contenere almeno un numero, una lettera minuscola e deve essere lunga tra 6 e 20 caratteri.";
        }
        $("#info-alert").text(msg);
        $("#info-alert").fadeIn();
    });
});

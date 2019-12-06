const timeToWait = 750; 
function returnToHomePage() {
    window.location="../php/index.php";
}

$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();

        const pattern = /^(?=.*[a-z])(?=.*\d).{6,20}$/;
        let new_password = $("#new-password").val();
        let repeat_password = $("#repeat-password").val();
        let msg = "";

        $("#info-alert").hide();
        $("#changeDone").hide();
        if (new_password.match(pattern)) {
            if (new_password == repeat_password) {
                new_password = md5($("#new-password").val());
                repeat_password = md5($("#repeat-password").val());
                $.ajax({
                    url: '../api/api-changePassword.php',
                    type: 'post',
                    data: { newPassword: new_password, repeatPassword: repeat_password },
                    success: function(code) {
                        let msg = "";
                        if (code == 0) {
                            $("#changeDone").text("Password cambiata con successo!");
                            $("#changeDone").fadeIn();
                            setTimeout(returnToHomePage, timeToWait);
                        }
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

$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
        const new_password = $("#new-password").val().trim();
        const repeat_password = $("#repeat-password").val().trim();
        let msg = "";
        $("#info-alert").hide();
        if(new_password != "" && repeat_password != "" && new_password == repeat_password) {
            $.ajax({
                url: '../api/api-changePassword.php',
                type: 'post',
                data: { newPassword: new_password, repeatPassword: repeat_password },
                success: function(code) {
                    if (code == 1) {
                        $("#info-alert").text("Cambio password avvenuto con successo!");
                        $("#info-alert").fadeIn();
                        $("#info-alert").css("font-size", "10px");
                    }
                }
            });
        } 
        if (new_password == "" || repeat_password == "") {
            msg = "Username o password non inseriti!";
        } else if (new_password != repeat_password) {
            msg = "Le password non corrispondono, riprova!";
        }
        $("#info-alert").text(msg);
        $("#info-alert").fadeIn();
        $("#info-alert").css("font-size", "10px");
        //mancano i controlli sulle lettere maiuscole, minuscole, numeri e manca l'interazione col DB
    });
});

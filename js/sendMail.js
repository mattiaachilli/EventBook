const timeToWait = 1300;

$(document).ready(function() {
    $("form").submit(function(event) {
        event.preventDefault();

        const e_mail = $("#mail").val();
        $("#info-alert").hide();
        alert(e_mail);

        $.ajax({
            url: '../api/api-sendRecoveryPassword.php',
            type: 'post',
            data: { mail: e_mail },
            success: function(code) {
                let msg = "";
                if (code == 0) {
                    msg = "Mail inviata con successo!";
                    $("#info-alert").text(msg);
                    $("#info-alert").fadeIn();
                    setTimeout(reloadPage, timeToWait);
                } else {
                    msg = code;
                }
                $("#info-alert").text(msg);
                $("#info-alert").fadeIn();
            }
        });
    });
});

function reloadPage() {
    window.location="../php/login.php";
}
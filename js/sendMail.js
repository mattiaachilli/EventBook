const timeToWait = 1300;

$(document).ready(function() {
    $("form").submit(function(event) {
        event.preventDefault();

        const e_mail = $("#mail").val();
        $("#info-alert").hide();
        const wheel = '</br><div class="spinner-border text-primary" role="status">' +
                      '<span class="sr-only"/>' +
                      '</div>';
        $("#wheel").html(wheel);
        $("#wheel").show();

        $.ajax({
            url: '../api/api-sendRecoveryPassword.php',
            type: 'post',
            data: { mail: e_mail },
            success: function(code) {
                let msg = "";
                $("#wheel").html("");
                $("#wheel").hide();
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
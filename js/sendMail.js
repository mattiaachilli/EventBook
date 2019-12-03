$(document).ready(function() {
    $("form").submit(function(event) {
        event.preventDefault();

        const e_mail = $("#email").val();
        const randomPassword = generateRandomString();
        $("#info-alert").hide();

        $.ajax({
            url: '../api/api-sendMail.php',
            type: 'post',
            data: { mail: e_mail, randomPassword: randomPassword },
            success: function(code) {
                let msg = "";
                if (code == 1) {
                    Email.send({
                        Host : "smtp.gmail.com",
                        Username : "eventbook00@gmail.com",
                        Password : "ciaoraga12",
                        To : e_mail,
                        From : "eventbook00@gmail.com",
                        Subject : "Nuova password",
                        Body : "La nuova password di accesso ad EventBook è: " + randomPassword 
                                + ". Puoi cambiarla quando vuoi nell'apposita sezione.", 
                    }).then(
                        msg = "La nuova password è stata inviata all'indirizzo inserito!"
                    );
                } else {
                    msg = "Nessun account trovato legato a questa mail, riprovare.";
                }
                $("#info-alert").text(msg);
                $("#info-alert").fadeIn();
            }
        });
    });
});

function generateRandomString() {
    let randomPassword = "";
    const length = 8;
    const pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (let i = 0; i < length; i++) {
        randomPassword += pattern.charAt(Math.floor(Math.random() * pattern.length));
    }
    return randomPassword;
}
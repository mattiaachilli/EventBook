$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
        $("small").each(function(){
            $(this).hide();
        });
        const usernameSmall = $("#username").siblings().filter("small");
        const emailSmall = $("#email").siblings().filter("small");

        const psw = md5($("#password").val());
        const confermPsw = md5($("#conferma-password").val());
        const user = $("#username").val();
        const email = $("#email").val();
        const nome = $("#nome").val();
        const cognome = $("#cognome").val();
        const checkbox = $("#checkbox").is(":checked")? 1 : 0;
        $.ajax({
            url: '../api/api-registration.php',
            type: 'post',
            data: {username: user, password: psw, confermaPassword: confermPsw, email: email, nome: nome, cognome: cognome, organizzatore: checkbox},
            success: function(code){
                console.log(code);
                switch(code){
                    case "Username già in uso":
                        $(usernameSmall).hide().html(code).fadeIn(1000);
                        break;
                    case "User registrato":
                        document.location.href = "index.php"
                        break;
                    case "Questo campo non può essere vuoto": 
                        $("#reg-form input").each(function(){
                            if($(this).val() === ""){
                                $(this).siblings().filter("small").hide().html(code).fadeIn(1000);
                            }
                        });
                        break;
                    case "Questi campi devono essere uguali":
                        $("#password").siblings().filter("small").hide().html(code).fadeIn(1000);
                        $("#conferma-password").siblings().filter("small").hide().html(code).fadeIn(1000);
                        break;
                    case "Email già in uso": 
                        $(emailSmall).hide().html(code).fadeIn(1000);
                        break;
                }
            }
        });
    });
});
$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
        $("small").each(function(){
            $(this).hide();
        });

        const usernameSmall = $("#username").siblings().filter("small");
        const emailSmall = $("#email").siblings().filter("small");

        const psw = $.md5($("#password").val());
        const confermPsw = $("#conferma-password").val();
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
                    case "0":
                        $(usernameSmall).hide().html("Username già in uso").fadeIn(1000);
                        break;
                    case "1":
                        document.location.href = "index.php"
                        break;
                    case "2": 
                        console.log("ciao");
                        $("#reg-form input").each(function(){
                            if($(this).val() === ""){
                                $(this).siblings().filter("small").hide().html("Campo vuoto").fadeIn(1000);
                            }
                        });
                        break;
                    case "3":
                        $("#password").siblings().filter("small").hide().html("Questi campi devono essere uguali").fadeIn(1000);
                        $("#conferma-password").siblings().filter("small").hide().html("Questi campi devono essere uguali").fadeIn(1000);
                        break;
                    case "4": 
                        $(emailSmall).hide().html("Email già in uso").fadeIn(1000);
                        break;
                }
            }
        });
    });
});
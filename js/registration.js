$(document).ready(function(){
    $("#regButton").click(function(){
        $("small").each(function(){
            $(this).hide();
        });
        let emptySpaces = false;
        $("#reg-form input").each(function(){
            if($(this).val() === ""){
                $(this).siblings().filter("small").hide().html("Campo vuoto").fadeIn(1000);
                emptySpaces = true;
            }
        });
        if(!emptySpaces){
            const psw = $("#password").val();
            const confermPsw = $("#conferma-password").val();
            if(psw !== confermPsw){
                $("#password").siblings().filter("small").hide().html("Questi campi devono essere uguali").fadeIn(1000);
                $("#conferma-password").siblings().filter("small").hide().html("Questi campi devono essere uguali").fadeIn(1000);
            } else {
                const user = $("#username").val();
                const email = $("#email").val();
                const nome = $("#nome").val();
                const cognome = $("#cognome").val();
                const checkbox = $("#checkbox").is(":checked")? 1 : 0;
                $.ajax({
                    url: '../api/api-registration.php',
                    type: 'post',
                    data: {username: user, password:psw, email: email, nome: nome, cognome: cognome, organizzatore: checkbox},
                    success: function(code){
                        if(code == 1){
                            console.log(code);
                            document.location.href = "index.php"
                        } else {
                            console.log(code);
                            $("#username").siblings().filter("small").hide().html("Username o email in uso").fadeIn(1000);
                            $("#email").siblings().filter("small").hide().html("Username o email in uso").fadeIn(1000);
                        }
                    },
                });
            }
        }
    });
});
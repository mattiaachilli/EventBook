$(document).ready(function(){
    $("form").submit(function(event) {
        event.preventDefault();
        $("small").each(function(){
            $(this).hide();
        });
        const user = $("#user").val();
        const email = $("#email").val();
        let psw = $("#password").val();
        if(psw !== ""){
            psw = md5(psw);
        }
        $.ajax({
            url: '../api/api-modify.php',
            type: 'post',
            data: {user: user, password: psw, email: email},
            success: function(code){
                console.log(code);
                switch(code){
                    case "Username già in uso":
                        $("#userSmall").hide().html(code).fadeIn(1000);
                        break;
                    case "Modifica effettuata":
                        document.location.href = "index.php"
                        break;
                    case "Questo campo non può essere vuoto": 
                        $("#reg-form input").each(function(){
                            if($(this).val() === ""){
                                $(this).siblings().filter("small").hide().html(code).fadeIn(1000);
                            }
                        });
                        break;
                    case "Email già in uso": 
                        $("#emailSmall").hide().html(code).fadeIn(1000);
                        break;
                }
            }
        });
    });
});
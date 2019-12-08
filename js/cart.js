let i = 0;
const txt = 'Carrello vuoto';
const speed = 200; 
function typeWriter() {
    const title = document.getElementById("title-cart");
    title.style.display = "block";
    if (i < txt.length) {
        title.innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
  }
}

/* Delete elements */
function check() {
    return $("#cart").children().length == 0;
}

function removeElements() {
    $("#cart").parent().parent().remove();
    $("#cart").remove();
    $("#payment").remove();
}

function checkAndRemove() {
    if(check()) {
        $("#cart").hide(1000);
        $("#cart").parent().parent().hide(1000);
        $("#payment").hide(1000);
        setTimeout(
            function() 
            {
                removeElements();
            }, 500);
        $("#title-cart").hide(1000).delay(500, function() {
            $("#title-cart").text("");
            typeWriter();
        });
    }
}

$(document).ready(function() {
    /* Check if there aren't products in the cart */
    if(check()) {
        removeElements();
        $("#title-cart").text("");
        $("#title-cart").html(txt);
    }

    $(".price").each(function() {
        const val = $(this).text();
        console.log(val);
    });

    /* Click on trash */
    $(".trash").click(function() {
        const row = $(this).parents(".row")[1];
        const id = $(row).children('input[type="hidden"]').val();
        console.log(id);
        $(row).hide(1000);
        const hr = $(row).next();
        if($(hr).is("hr")) {
            $(hr).hide(1000);
        }
        /* Remove from html */
        setTimeout(
            function() 
            {
                $(row).remove();
                $(hr).remove();
                checkAndRemove();
            }, 1000);
        /* Remove from cookie.... */
        $.ajax({
            url: '../api/api-removeFromCookie.php',
            type: 'post',
            data: {id_event: id}
        });
    });

    /* Continue shopping button */
    $("#continue").click(function() {
        document.location.href = "events.php";
    });

    /* Buy button */
    $("#buy").click(function() {
        $.ajax({
            url: '../api/api-pay.php',
            success: function(code) {     
                console.log(code);
                if(code == 0) {
                    $("#alert_class").addClass("alert-warning");
                    $("#alert_heading").html("Attenzione!");
                    $("#alert_class > p").html("Per procedere con l'acquisto devi essere loggato!");
                } else if(code == 1) {
                    $("#alert_class").addClass("alert-success");
                    $("#alert_heading").html("Acquisto effettuato con successo!");
                    $("#alert_class > p").html("Il suo acquisto è stato effettuato con successo, può visualizzare l'acquisto nell'apposita sezione");
                } else {
                    $("#alert_class").addClass("alert-warning");
                    $("#alert_class > p").html(code);
                }
                $("#alert").fadeIn(500); 
                setTimeout(
                    function() 
                    {
                        $("#alert").fadeOut(500);
                        if(code == 1) {
                            document.location.href = "cart.php"; /* Riepilogo poi */
                        }
                    }, 5000);
            }
        });
    });
});
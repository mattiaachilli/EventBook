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

function check() {
    return $("#cart").children().length == 1 || $("#cart").children().length == 0;
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
    
    $.getJSON("../api/api-cart.php", function(data){
        
    });
    /* Check if there aren't products in the cart */
    if(check()) {
        removeElements();
        $("#title-cart").text("");
        typeWriter();
    }
    $(".trash").click(function() {
        const row = $(this).parents(".row")[1];
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
            }, 500);
        checkAndRemove();

        /* Remove from cookie.... */
        //$.ajax()
    });
    /* Continue shopping button */
    $("#continua").click(function() {
        document.location.href = "events.php";
    });
    /* Buy button */
    $("#buy").click(function() {
        $.ajax({
            url: '../api/api-checklogin.php',
            success: function(code) {     
                console.log(code);
                if(code == 0) {
                    $("#alert").fadeIn();
                }    
            }
        });
    });
});
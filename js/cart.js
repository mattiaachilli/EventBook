let i = 0;
const txt = 'Carrello vuoto';
const speed = 200; 
function typeWriter() {
    const title = document.getElementById("title-cart");
    title.style.display = "block";
    console.log(txt.length);
    if (i < txt.length) {
        title.innerHTML += txt.charAt(i);
        i++;
        console.log(i);
        setTimeout(typeWriter, speed);
  }
}

function check() {
    return $("#carrello").children().length == 1;
}
function checkAndRemove() {
    if(check()) {
        $("#carrello").hide(1000);
        $("#carrello").parent().parent().hide(1000);
        $("#payment").hide(1000);
        setTimeout(
            function() 
            {
                $("#carrello").remove();
                $("#carrello").parent().parent().remove();
                $("#payment").remove();
            }, 500);
        $("#title-cart").hide(1000).delay(500, function() {
            $("#title-cart").text("");
            typeWriter();
        });
    }
}

$(document).ready(function() {
    /* Controllo iniziale */
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
});
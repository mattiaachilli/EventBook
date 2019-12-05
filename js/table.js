$(document).ready(function(){
    $("button").click(function(event){
        event.preventDefault();
        const user = $(this).closest("td").siblings("td[headers = 'organizzatore']").text();
        const nome_evento = $(this).closest("td").siblings("td[headers = 'evento']").text();
        const id_evento = $(this).closest("div").siblings("input").val();
        const choice = $(this).hasClass("yButton") ? 1 : 0;
        console.log(choice);
        $.ajax({
            url: "../api/api-approvation.php",
            type: "post",
            data: {evento: nome_evento, organizzatore: user, id: id_evento, scelta: choice},
            success: function(code){
                console.log(code);
            }
        });
        $(this).parent().siblings().first().children().first().prop("disabled",true);
    });
});
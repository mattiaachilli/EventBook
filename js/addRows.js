$(document).ready(function(){
    //se si mette bottone mostra altro
    $.getJSON("../api/api-table.php", function(data){
        let rows = insertRows(data);
        $("tbody").append(rows);
    });
    $(".yButton").click(function(){
        let user = $(this).closest("td").siblings().first().text();
        let nome_evento = $(this).closest("td").siblings("td[headers = 'evento']").text();
        $(this).parent().siblings().first().children().first().prop("disabled",true);
    });
});
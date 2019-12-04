function insertRows(data){
    let result;
    for(let i = 0; i < data.length; i++){
        result += `<tr>
                <td headers = "organizzatore" class = "text-center">${data[i]["Username"]}</td>
                <td headers = "evento" class = "text-center">${data[i]["Nome_evento"]}</td>
                <td headers = "buttons" class = "text-center row m-0">
                    <div class = "col-6">
                        <button type="button" id = "yButton_${i}" class="yButton btn btn-primary container-fluid">Y</button>
                    </div>
                    <div class = "col-6">
                        <button type="button" id = "fButton_${i}" class="fButton btn btn-primary container-fluid">N</button>
                    </div>
                </td>
            </tr>`;
    }
    return result;
}

$(document).ready(function(){
    $.getJSON("../api/api-table.php", function(data){
        let rows = insertRows(data);
        $("tbody").append(rows);
        $(".yButton").click(function(){
            let user = $(this).closest("td").siblings().first().text();
            let nome_evento = $(this).closest("td").siblings("td[headers = 'evento']").text();
            $(this).parent().siblings().first().children().first().prop("disabled",true);
        });
    });
});
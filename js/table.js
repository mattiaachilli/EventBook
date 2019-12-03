function insertRows(data){
    let result;
    result = `<table class="table text-white border-bottom" id = "table">
    <caption class = "text-white text-center font-italic mt-4 p-0">List of events</caption>
    <thead>
        <tr>
            <th class = "border-top-0 text-center" id = "organizzatore" scope="col">Organizzatore</th>
            <th class = "border-top-0 text-center" id = "evento" scope="col">Evento</th>
            <th class = "border-0 text-center" id = "buttons" scope = "col"></th>
        </tr>
    </thead>
    <tbody>`;
    for(let i = 0; i < data.length; i++){
        result += `<tr>
                <td headers = "organizzatore" class = "text-center">${data[i]["Username"]}</td>
                <td headers = "evento" class = "text-center">${data[i]["Nome_evento"]}</td>
                <td headers = "buttons" class = "text-center row m-0">
                    <div class = "col-6">
                        <button type="button" id = "regButton" class="btn btn-primary container-fluid">Y</button>
                    </div>
                    <div class = "col-6">
                        <button type="button" id = "regButton" class="btn btn-primary container-fluid">N</button>
                    </div>
                </td>
            </tr>`;
    }
    return result += `</tbody>
    </table>`;
}

$(document).ready(function(){
    $("#appButton").click(function(){
        //$(".form-div").load("phpPages/tablePage.php");
        $.getJSON("../api/api-table.php", function(data){
            let rows = insertRows(data);
            $(".form-div").html("").append(rows);
        });
    });

    $("#catButton").click(function(){
        $(".form-div").load("phpPages/insertNewCategory.php");
    });
});
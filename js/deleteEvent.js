let timeToWait = 1000;

$(document).ready(function(){
    
    $("button[name='delete']").click(function(event) {
        event.preventDefault();
        const eventID = $(this).val();
        const label = "#areUSure" + eventID;
        $(label).hide();
        if ($(label).html() != "") {
            $(label).html("");
        } else {
            const paragraph =   '<div class="row">'+
                                '<div class="col-2"></div>' +
                                '<div class="col-8 text-center mb-2">' +
                                    '<label>Vuoi davvero cancellare questo evento?</label>'+
                                '</div>' +
                                '<div class="col-2"></div>' +
                            '</div>' + 
                            '<div class="row">' +
                                '<div class="col-4"></div>' +
                                '<div class="col-4">' +
                                    '<button name="si" value='+ eventID +' type="submit" class="btn btn-primary mb-2 container-fluid">Si</button>' +
                                '</div>' +
                                '<div class="col-4"></div>' +
                            '</div>';
            $(label).html(paragraph);

            $("button[name='si']").click(function(event) {
                event.preventDefault();
                const id = $(this).val();
                $.ajax({
                    url: '../api/api-deleteEvent.php',
                    type: 'post',
                    data: {eventToDelete: id},
                    success: function(code){
                        if (code != 0) {
                            $(label).hide();
                            const result = '<div class="col-12 text-center mb-2">' +
                                                '<label>' + code + '</label>'+
                                            '</div>';
                            $(label).html(result);
                            $(label).fadeIn("slow");
                        } else {
                            $(label).hide();
                            const deleted = '<div class="col-12 text-center mb-2">' +
                                                'Evento cancellato con successo!' + 
                                            '</div>';
                            $(label).html(deleted);
                            $(label).fadeIn("slow");
                            setTimeout(reloadPage, timeToWait);
                        }
                    }
                });
            });
            $(label).fadeIn("slow");
        }
    });
});

function reloadPage() {
    window.location="../php/publishedEvents.php";
}
let timeToWait = 1200;

$(document).ready(function(){
    
    $("button[name='delete']").click(function(event) {
        event.preventDefault();
        const id = $(this).val();
        const name = "#areUSure" + id;
        $(name).hide();
        if ($(name).html() != "") {
            $(name).html("");
        } else {
            const p =   '<div class="row">'+
                            '<div class="col-2"></div>' +
                            '<div class="col-8 text-center mb-2">' +
                                '<label>Vuoi davvero cancellare questo evento?</label>'+
                            '</div>' +
                            '<div class="col-2"></div>' +
                        '</div>' + 
                        '<div class="row">' +
                            '<div class="col-4"></div>' +
                            '<div class="col-4">' +
                                '<button name="si" value='+ id +' type="submit" class="btn btn-primary mb-2 container-fluid">Si</button>' +
                            '</div>' +
                            '<div class="col-4"></div>' +
                        '</div>';
            $(name).html(p);
            $("button[name='si']").click(function(event) {
                event.preventDefault();
                const id = $(this).val();
                $.ajax({
                    url: '../api/api-deleteEvent.php',
                    type: 'post',
                    data: {eventToDelete: id},
                    success: function(code){
                        if (code != 0) {
                            $(name).hide();
                            const deleted = '<div class="col-12 text-center mb-2">' +
                                                '<label>' + code + '</label>'+
                                            '</div>';
                            $(name).html(deleted);
                            $(name).fadeIn("slow");
                        } else {
                            $(name).hide();
                            const deleted = '<div class="col-12 text-center mb-2">' +
                                                'Evento cancellato con successo!' + 
                                            '</div>';
                            $(name).html(deleted);
                            $(name).fadeIn("slow");
                            setTimeout(reloadPage, timeToWait);
                        }
                    }
                });
            });
            $(name).fadeIn("slow");
        }
    });
});

function reloadPage() {
    window.location="../php/publishedEvents.php";
}
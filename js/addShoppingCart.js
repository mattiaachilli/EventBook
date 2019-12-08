$(document).ready(function() {
    $("#addCart").click(function() {
        event.preventDefault();
        const id_event = $("#event_id").val();
        const n_ticket = $("#ticket").val();
        if(n_ticket > 0) {
            $.ajax({
                url: '../api/api-addShoppingCart.php',
                type: 'post',
                data: {tickets: n_ticket, id: id_event},
                success: function(code) {     
                    if(code == 0) {
                        alert("Biglietti insufficienti");
                    } else {
                        $("#addCart").addClass("d-none");
                        $("#checkOk").removeClass("d-none");
                        setTimeout(
                            function() 
                            {
                                $("#checkOk").addClass("d-none");
                                $("#addCart").removeClass("d-none");
                            }, 5000);
                    }
                }
            });
        } else {
            alert("Errore biglietti");
        }
    });
});
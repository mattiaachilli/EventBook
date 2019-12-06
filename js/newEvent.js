let capacity = 0;
let imageIsCorrect = true;

$(document).ready(function() {
    initializeLabels();
    
    $("form").submit(function(event) {
        event.preventDefault();
        
        const eventName = $("#name").val();
        const desc = $("#description").val();
        const price = $("#price").val();
        const tickets = $("#tickets").val();
        const date = $("#date").val();
        const category = $("#category").val();
        const location = $("#location").val();
        const path = $("#image").val().replace(/^.*[\\\/]/, '');

        if (checkFields(eventName, desc, price, tickets, date, category, location, path) && imageIsCorrect) {
            const nomeLocation = location.split(" - ")[0];
            const city = location.split(" - ")[1].split(" ")[0];
            const country = location.split(" (")[1].split(")")[0];
            $.ajax({
                url: '../api/api-newEvent.php',
                type: 'post',
                data: { eventName: eventName, desc: desc, price: price, 
                        tickets: tickets, date: date, category: category, location: nomeLocation, nazione: country,
                        città: city, path: path},
                success: function(code) {
                    if (code == 0) {
                        $("#result").text("Nuovo evento registrato con successo!");
                        uploadImage();
                    } else {
                        $("#result").text(code);
                    } 
                }
            });
        }
    });

    $("#location").on("change", function(event) {
        const location = $("#location").val();
        const name = location.split(" - ")[0];
        const city = location.split(" - ")[1].split(" ")[0];
        const country = location.split(" (")[1].split(")")[0];
        $.ajax({
            url: '../api/api-getLocationCapacity.php',
            type: 'post',
            data: { locationName: name, locationCountry: country, locationCity: city },
            success: function(code) {
                if (code != 1) {
                    capacity = code;
                    $("#maxTickets").text("Biglietti disponibili (max. " + capacity + ")");
                    $("#wrongTickets").text("Inserisci il numero di biglietti disponibili. (max. "+ capacity +").");
                }   
            }
        });
    });

    $("#image").on("change", function(event) {
        const fileName = $("#image").val().replace(/^.*[\\\/]/, '');
        $("#pathImg").text(fileName);
        if (fileName != "") {
            checkImage();
            $("#wrongImg").hide();
        }
    });
});

function uploadImage() {  
    let file_data = $('#image').prop('files')[0];   
    let form_data = new FormData();                  
    form_data.append('image', file_data);                         
    $.ajax({
        url: '../api/api-uploadImage.php', 
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                  
        type: 'post',
        success: function(code){
            if (code != 0) {
                $("#wrongImg").text(code);
                $("#wrongImg").fadeIn();
            } else {
                $("#wrongImg").hide();
            }
        }
    });
}

function checkImage() {  
    let file_data = $('#image').prop('files')[0];   
    let form_data = new FormData();                  
    form_data.append('image', file_data);                         
    $.ajax({
        url: '../api/api-checkImage.php', 
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                  
        type: 'post',
        success: function(code){
            if (code != 0) {
                $("#wrongImg").text(code);
                $("#wrongImg").fadeIn();
                imageIsCorrect = false;
            } else {
                imageIsCorrect = true;
                $("#wrongImg").hide();
            }
        }
    });
}

function checkFields(name, desc, price, tickets, date, category, location, path) {

    initializeLabels();
    let check = true;

    if (name == "" || name.length > 20) {
        check = false;
        $("#wrongName").text("Inserisci un nome (max. 20)");
        $("#wrongName").fadeIn();
    }
    if (desc == "" || desc.length > 500) {
        check = false;
        $("#wrongDesc").text("Inserisci una breve descrizione (max. 500).");
        $("#wrongDesc").fadeIn();
    }
    if (date == "") {
        check = false;
        $("#wrongDate").text("Inserisci una data.");
        $("#wrongDate").fadeIn();
    }
    let pattern = /^[0-9]+$/;
    if (price == "" || !price.match(pattern) || price.length > 5) {
        check = false;
        $("#wrongPrice").text("Inserisci un prezzo per i biglietti dell'evento (max. 99999).");
        $("#wrongPrice").fadeIn();
    }
    if (tickets == "" || !tickets.match(pattern) || parseInt(tickets) > capacity) {
        check = false;
        $("#wrongTickets").text("Inserisci il numero di biglietti disponibili. (max. "+ capacity +").");
        $("#wrongTickets").fadeIn();
    }
    if (category == "") {
        check = false;
        $("#wrongCategory").text("Scegli una categoria.");
        $("#wrongCategory").fadeIn();
    }
    if (location == "") {
        check = false;
        $("#wrongLocation").text("Scegli una location.");
        $("#wrongLocation").fadeIn();
    }
    if (path == "") {
        check = false;
        $("#wrongImg").text("Caricare un'immagine (formato quadrato)");
        $("#wrongImg").fadeIn();
    }
    return check;
}

function initializeLabels() {
    $("#wrongName").hide();
    $("#wrongDesc").hide();
    $("#wrongDate").hide();
    $("#wrongPrice").hide();
    $("#wrongTickets").hide();
    $("#wrongCategory").hide();
    $("#wrongLocation").hide();
    $("#wrongImg").hide();
}

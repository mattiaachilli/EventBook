const timeToWait = 1300;

$(document).ready(function() {
    initializeLabels();

    $("form").submit(function(event) {
        event.preventDefault();

        const name = $("#name").val();
        const country = $("#country").val();
        const city = $("#city").val();
        const street = $("#street").val();
        const capacity = $("#capacity").val();
        const civicN = $("#civicN").val();

        if (checkFields(name, country, city, street, capacity, civicN)) {
            $.ajax({
                url: '../api/api-newLocation.php',
                type: 'post',
                data: {name: name, country: country, city: city, street: street,
                       capacity: capacity, civicN: civicN },
                success: function(code) {
                    if (code == 0) {
                        const wheel = '</br><div class="spinner-border text-primary" role="status">' +
                                      '<span class="sr-only"/>' +
                                      '</div>';
                        $("#result").html("Location inserita con successo!" + wheel);
                        $("#result").fadeIn();
                        setTimeout(reloadPage, timeToWait);
                    } else {
                        $("#result").text(code);
                        $("#result").fadeIn();
                    }
                }
            });
        }
    });
});

function checkFields(name, country, city, street, capacity, civicN) {

    initializeLabels();
    let check = true;

    if (name == "" || name.length > 20) {
        check = false;
        $("#wrongName").text("Inserisci un nome (max. 20)");
        $("#wrongName").fadeIn();
    }
    if (country == "" || country.length > 20) {
        check = false;
        $("#wrongCountry").text("Inserisci una nazione (max. 20).");
        $("#wrongCountry").fadeIn();
    }
    if (city == "" || country.length > 20) {
        check = false;
        $("#wrongCity").text("Inserisci una città (max. 20).");
        $("#wrongCity").fadeIn();
    }
    if (street == "" || street.length > 20) {
        check = false;
        $("#wrongStreet").text("Inserisci una via (max.20).");
        $("#wrongStreet").fadeIn();
    }
    let pattern = /^[0-9]+$/;
    if (capacity == "" || !capacity.match(pattern) || capacity.length > 6) {
        check = false;
        $("#wrongCapacity").text("Inserisci la capienza della location. (max. 999999).");
        $("#wrongCapacity").fadeIn();
    }
    if (civicN == "" || !civicN.match(pattern) || civicN.length > 4) {
        check = false;
        $("#wrongCivicN").text("Inserisci il numero civico. (max. 9999).");
        $("#wrongCivicN").fadeIn();
    }
    return check;
}

function initializeLabels() {
    $("#result").hide();
    $("#wrongName").hide();
    $("#wrongCountry").hide();
    $("#wrongCity").hide();
    $("#wrongStreet").hide();
    $("#wrongCapacity").hide();
    $("#wrongCivicN").hide();
}

function reloadPage() {
    const previousPage = document.referrer;
    if (previousPage.includes("newEvent")) {
        window.location = previousPage;
    } else {
        window.location = "../php/publishedEvents.php";
    }
}
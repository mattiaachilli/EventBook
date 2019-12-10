function setCookie(name, value, duration) {
    var d = new Date();
    d.setTime(d.getTime() + (duration * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + duration + ";path=/";
}

function getCookie(name) {
    var name = name + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$(document).ready(function(){
    if (!getCookie("acceptCookies")) {
        $(".cookie").addClass("show");
    }

    $(".acceptcookies").click(function (){
        setCookie("acceptCookies", true, 365);
        $(".cookie").removeClass("show");
    });
});

function leer_cookie(cookie) {
    var ret = null
    var cadena = cookie + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        if (cookies[i].indexOf(cadena) != -1) {
            var tam = (i == 0) ? cadena.length : cadena.length + 1;
            ret = cookies[i].substring(tam, cookies[i].length);
            break;
        } 
    }
    return ret;
}

function aceptar_cookie() {
    var expire = new Date();
    expire = new Date(expire.getTime() + 7776000000);
    document.cookie = "cookie_pawshappy=aceptada; expires=" + expire;
    var visit = leer_cookie("cookie_pawshappy");
    if (visit == "aceptada") {
        $('#overbox3').toggle();
    }
}

jQuery(function () {
    var visit = leer_cookie("cookie_pawshappy");
    if (visit == "aceptada") {
        $('#overbox3').toggle();
    } /*else {
        var expire = new Date();
        expire = new Date(expire.getTime() + 7776000000);
        document.cookie = "cookie_pawshappy=aceptada; expires=" + expire;
    }*/
});
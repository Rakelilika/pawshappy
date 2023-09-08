function validar_usuario() {
    limpiar_errores_registro();
    var formulario_ok = true;
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var direccion = document.getElementById("direccion").value;
    var cp = document.getElementById("cp").value;
    var ciudad = document.getElementById("ciudad").value;
    var select = document.getElementById("provincia");
    var provincia = select.options[select.selectedIndex].value;
    var telefono = document.getElementById("telefono").value;
    var fecha = document.getElementById("fecha_nacimiento").value;
    var email = document.getElementById("email").value;
    var contrasena = document.getElementById("password").value;
    var contrasena2 = document.getElementById("password_confirmation").value;

    var patron = /^[A-ZÁÉÍÓÚÑ]{1}[A-ZÁÉÍÓÚÑa-zñáéíóú ]{1,}$/;
    var patron_cp = /^\d{5}$/;
    var patron_telefono = /^[\d+ ]{9,}$/;
    var patron_direccion = /^[A-ZÁÉÍÓÚÑ]{1}[A-ZÁÉÍÓÚÑa-zñáéíóú\d ]{1,}?$/;
    var patron_fecha = /^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/;
    var patron_email = /^[\w\-\.]{3,}@([\w-]{2,}\.)[\w-]{2,}$/;
    var patron_con = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\.\_]{8,}$/;

    if (!nombre.match(patron)) {
        $('#error_nombre').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!apellidos.match(patron)) {
        $('#error_apellidos').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!direccion.match(patron_direccion)) {
        $('#error_direccion').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!cp.match(patron_cp)) {
        $('#error_cp').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!ciudad.match(patron)) {
        $('#error_ciudad').removeAttr('hidden');
        formulario_ok = false;
    }
    if (provincia == "Seleccione su provincia") {
        $('#error_provincia').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!telefono.match(patron_telefono)) {
        $('#error_telefono').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!fecha.match(patron_fecha)) {
        $('#error_fecha1').removeAttr('hidden');
        formulario_ok = false;
    } else {
        var edad = calcular_edad(fecha);
        if (edad < 18) {
            $('#error_fecha2').removeAttr('hidden');
            formulario_ok = false;
        }
    }
    if (!email.match(patron_email)) {
        $('#error_email').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!contrasena.match(patron_con)) {
        $('#error_contrasena').removeAttr('hidden');
        formulario_ok = false;
    }
    if (contrasena2 != contrasena) {
        $('#error_contrasena2').removeAttr('hidden');
        formulario_ok = false;
    }
    if (formulario_ok) {
        document.getElementById("formulario_registro").submit();
    }
}

function limpiar_errores_registro() {
    $('#error_nombre').attr('hidden', true);
    $('#error_apellidos').attr('hidden', true);
    $('#error_direccion').attr('hidden', true);
    $('#error_cp').attr('hidden', true);
    $('#error_ciudad').attr('hidden', true);
    $('#error_provincia').attr('hidden', true);
    $('#error_telefono').attr('hidden', true);
    $('#error_fecha1').attr('hidden', true);
    $('#error_fecha2').attr('hidden', true);
    $('#error_email').attr('hidden', true);
    $('#error_contrasena').attr('hidden', true);
    $('#error_contrasena2').attr('hidden', true);
}

function calcular_edad(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function validar_perfil(form) {
    limpiar_errores_registro();
    var formulario_ok = true;
    var nombre = document.getElementById("nombre").value;
    var apellidos = document.getElementById("apellidos").value;
    var direccion = document.getElementById("direccion").value;
    var cp = document.getElementById("cp").value;
    var ciudad = document.getElementById("ciudad").value;
    var select = document.getElementById("provincia");
    var provincia = select.options[select.selectedIndex].value;
    var telefono = document.getElementById("telefono").value;
    var fecha = document.getElementById("fecha_nacimiento").value;
    var email = document.getElementById("email").value;

    var patron = /^[A-ZÁÉÍÓÚÑa-zñáéíóú]{1}[A-ZÁÉÍÓÚÑa-zñáéíóú ]{1,}$/;
    var patron_cp = /^\d{5}$/;
    var patron_telefono = /^[\d]{9,}$/;
    var patron_direccion = /^[A-ZÁÉÍÓÚÑ]{1}[A-ZÁÉÍÓÚÑa-zñáéíóú\d ]{1,}?$/;
    var patron_fecha = /^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/;
    var patron_email = /^[\w\-\.]{3,}@([\w-]{2,}\.)[\w-]{2,}$/;

    if (!nombre.match(patron)) {
        $('#error_nombre').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!apellidos.match(patron)) {
        $('#error_apellidos').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!direccion.match(patron_direccion)) {
        $('#error_direccion').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!cp.match(patron_cp)) {
        $('#error_cp').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!ciudad.match(patron)) {
        $('#error_ciudad').removeAttr('hidden');
        formulario_ok = false;
    }
    if (provincia == "Seleccione su provincia") {
        $('#error_provincia').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!telefono.match(patron_telefono)) {
        $('#error_telefono').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!fecha.match(patron_fecha)) {
        $('#error_fecha1').removeAttr('hidden');
        formulario_ok = false;
    } else {
        var edad = calcular_edad(fecha);
        if (edad < 18) {
            $('#error_fecha2').removeAttr('hidden');
            formulario_ok = false;
        }
    }
    if (!email.match(patron_email)) {
        $('#error_email').removeAttr('hidden');
        formulario_ok = false;
    }
    if (formulario_ok) {
        form.submit();
    }
}

function limpiar_errores_actualizar_contrasena() {
    $('#error_contrasena').attr('hidden', true);
    $('#error_contrasena1').attr('hidden', true);
    $('#error_contrasena2').attr('hidden', true);
}

function actualizar_contrasena(form) {
    limpiar_errores_actualizar_contrasena();
    var formulario_ok = true;
    var contrasena = document.getElementById("current_password").value;
    var contrasena1 = document.getElementById("password").value;
    var contrasena2 = document.getElementById("password_confirmation").value;

    var patron_con = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d\.\_]{8,}$/;

    if (!contrasena.match(patron_con)) {
        $('#error_contrasena').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!contrasena1.match(patron_con)) {
        $('#error_contrasena1').removeAttr('hidden');
        formulario_ok = false;
    }
    if (contrasena2 != contrasena1) {
        $('#error_contrasena2').removeAttr('hidden');
        formulario_ok = false;
    }
    if (formulario_ok) {
        form.submit();
    }
}

function limpiar_errores_mascota() {
    $('#error_nombre').attr('hidden', true);
    $('#error_sexo').attr('hidden', true);
    $('#error_tipo').attr('hidden', true);
    $('#error_otros').attr('hidden', true);
    $('#error_raza').attr('hidden', true);
    $('#error_fecha').attr('hidden', true);
    $('#error_tamanio').attr('hidden', true);
    $('#error_descripcion').attr('hidden', true);
}

function validar_anadir_mascota(form) {

    limpiar_errores_mascota();

    var formulario_ok = true;
    var nombre = document.getElementById("nombre").value;
    var sexo = document.querySelector('input[name="sexo"]:checked').value;
    var select_tipo = document.getElementById("tipo");
    var tipo = select_tipo.options[select_tipo.selectedIndex].value;
    var otro = document.getElementById("otro").value;
    var raza = document.getElementById("raza").value;
    var fecha = document.getElementById("edad").value;
    var select_tamanio = document.getElementById("tamanio");
    var tamanio = select_tamanio.options[select_tamanio.selectedIndex].value;
    var descripcion = document.getElementById("descripcion").value;

    var patron = /^[A-ZÁÉÍÓÚÑa-zñáéíóú]{1}[A-ZÁÉÍÓÚÑa-zñáéíóú ]{1,}$/;
    var patron_descripcion = /^[\w\W]{2,250}$/; // \w: cualquier carácter alfanumérico, incluido el _, \W: cualquier carácter NO alfanumérico
    var patron_fecha = /^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/;

    if (!nombre.match(patron)) {
        $('#error_nombre').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!(sexo == 0 || sexo == 1 || sexo == 2)) {
        $('#error_sexo').removeAttr('hidden');
        formulario_ok = false;
    }
    if (tipo == "-1") {
        $('#error_tipo').removeAttr('hidden');
        formulario_ok = false;
    }
    if (tipo == "otros") {
        if (!otro.match(patron)) {
            $('#error_otros').removeAttr('hidden');
            formulario_ok = false;
        }
    }
    if (!raza.match(patron)) {
        $('#error_raza').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!fecha.match(patron_fecha)) {
        $('#error_fecha').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!(tamanio == 0 || tamanio == 1 || tamanio == 2)) {
        $('#error_tamanio').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!descripcion.match(patron_descripcion)) {
        $('#error_descripcion').removeAttr('hidden');
        formulario_ok = false;
    }
    if (formulario_ok) {
        form.submit();
    }
}

function limpiar_errores_buscador() {
    $('#error_mascota').attr('hidden', true);
    $('#error_fecha1').attr('hidden', true);
    $('#error_fecha2').attr('hidden', true);
    $('#error_fecha3').attr('hidden', true);
    $('#error_fecha4').attr('hidden', true);
    $('#error_provincia').attr('hidden', true);
}

function validar_buscador(form) {

    limpiar_errores_buscador();

    var formulario_ok = true;
    var fecha1 = document.getElementById("finicio").value;
    var fecha2 = document.getElementById("ffin").value;
    var select = document.getElementById("provincia");
    var provincia = select.options[select.selectedIndex].value;
    var fechaActual = new Date().toISOString().slice(0, 10);

    var patron_fecha = /^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/;

    var mascotas = $('#mascotas input:checked');
    if (mascotas.length < 1) {
        $('#error_mascota').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!fecha1.match(patron_fecha)) {
        $('#error_fecha1').removeAttr('hidden');
        formulario_ok = false;
    }
    if (!fecha2.match(patron_fecha)) {
        $('#error_fecha2').removeAttr('hidden');
        formulario_ok = false;
    }
    if (fecha1 > fecha2) {
        $('#error_fecha3').removeAttr('hidden');
        formulario_ok = false;
    }
    if (fechaActual > fecha1) {
        $('#error_fecha4').removeAttr('hidden');
        formulario_ok = false;
    }
    if (provincia == "Seleccione su provincia") {
        $('#error_provincia').removeAttr('hidden');
        formulario_ok = false;
    }
    if (formulario_ok) {
        form.submit();
    }
}

function mostrar_cuidador() {
    if (document.getElementById("es_cuidador").checked) {
        document.getElementById("enlace_cuidador").style.display = "block";
    } else {
        document.getElementById("enlace_cuidador").style.display = "none";
    }
}

function mostrar_otros() {
    var e = document.getElementById("tipo");
    var tipo = e.options[e.selectedIndex].value;
    if (tipo == 'otros') {
        document.getElementById("mostrar_otros").style.display = "block";
    } else {
        document.getElementById("mostrar_otros").style.display = "none";
    }
}

function mostrar_animales(checkbox, div) {
    if (document.getElementById(checkbox).checked) {
        document.getElementById(div).style.display = "block";
    } else {
        document.getElementById(div).style.display = "none";
    }
}

function mostrar_div() {
    var checkboxs = ['ch_perro', 'ch_gato', 'ch_hamster', 'ch_cobaya', 'ch_conejo', 'ch_huron', 'ch_ave', 'ch_pez', 'ch_reptil', 'ch_tortuga', 'ch_otros'];
    var divs = ['mostrar_perro', 'mostrar_gato', 'mostrar_hamster', 'mostrar_cobaya', 'mostrar_conejo', 'mostrar_huron', 'mostrar_ave', 'mostrar_pez', 'mostrar_reptil', 'mostrar_tortuga', 'mostrar_otros'];
    for (var i = 0; i <= (checkboxs.length - 1); i++) {
        if (document.getElementById(checkboxs[i]).checked) {
            document.getElementById(divs[i]).style.display = "block";
        } else {
            document.getElementById(divs[i]).style.display = "none";
        }
    }
}

function mandar_valoracion(id_estancia, id_mascota = false) {

    let idValoracion = (id_mascota) ? ("valoracion_" + id_estancia + "_" + id_mascota) : ("valoracion_" + id_estancia);
    let v = document.getElementById(idValoracion);
    console.log(v);
    console.log(idValoracion);
    let valoracion = v.options[v.selectedIndex].value;

    let idHref = (id_mascota) ? "enlace_" + id_estancia + "_" + id_mascota : "enlace_" + id_estancia;
    let href = document.getElementById(idHref).href;
    let url = href.replace(':valoracion', valoracion);
    console.log(valoracion);
    console.log(url);

    document.location.href = url;
}


function revisarTexto( elemento ) {
    const maximo = 25;
    const pattern = new RegExp('^[A-Z]+$', 'i');
    if( elemento.value == "" ) {
        elemento.className="error";
        return false;
    } else {
        if( elemento.value.length > maximo ) {
            elemento.className="error";
            return false;
        } else {
            if( !pattern.test( elemento.value )) {
                elemento.className="error";
                return false;
            }
            else {
                elemento.className="input";
            }
        }
    }
    return true;
}

function revisarNumero( elemento ) {
    const maximo = 9;
    const pattern = new RegExp('^[0-9]{1,9}$', 'i');
    if( elemento.value == "" ) {
        elemento.className="error";
        return false;
    } else {
        if( elemento.value.length != maximo ) {
            elemento.className="error";
            return false;
        } else {
            if( !pattern.test( elemento.value )) {
                elemento.className="error";
                return false;
            }
            else {
                elemento.className="input";
            }
        }
    }
    return true;
}

function revisarEmail( elemento ) {
    var data =elemento.value;
    var exp =/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if( exp.test(data)){
        elemento.className='input';
    } else {
        elemento.className='error';
        return false;
    }
    return true;
}

function validar() {
    var datosCorrectos=true;
    var error="";

    if(!(revisarTexto(document.getElementById("nombre")))){
        datosCorrectos=false;
        error="\nEl campo de Nombre esta vacio o incorrecto";
    }

    if(!(revisarEmail(document.getElementById("mail")))){
        datosCorrectos=false;
        error="\nEl campo de Email esta vacio o incorrecto";
    }

    if(!(revisarNumero(document.getElementById("telefono")))){
        datosCorrectos=false;
        error="\nEl campo telefono esta vacio o incorrecto";
    }

    var selec = n_form.grupo.selectedIndex;
    if( n_form.grupo.options[selec].value=="0") {
        datosCorrectos=false;
        error="\nFalta indicar el grupo del contacto";
    }

    if(!datosCorrectos){
        alert("Hay errores en el formulario" + error );
    } else {
        alert("Se ha agregado al usuario correctamente")
        location.href = "index.html";
        evt.preventDefault();
    }

    
}
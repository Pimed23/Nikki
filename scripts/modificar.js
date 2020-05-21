modificar_data = function( data_mod ) {
    var tam = data_mod.length;
    document.getElementById('nombre').value = data_mod[ 0 ]['nombre'];
    document.getElementById('p_apellido').value = data_mod[ 0 ]['p_apellido'];
    document.getElementById('s_apellido').value = data_mod[ 0 ]['s_apellido'];
    document.getElementById('fech_nac').value = data_mod[ 0 ]['fech_nac'];
    document.getElementById('grupo').value = data_mod[ 0 ]['grupo'];
    document.getElementById('departamento').value = data_mod[ 0 ]['departamento'];
    document.getElementById('distrito').value = data_mod[ 0 ]['distrito'];
    document.getElementById('direccion').value = data_mod[ 0 ]['direccion'];
    document.getElementById('mail').value = data_mod[ 0 ]['dir_correo'];
    document.getElementById('rubro_correo').value = data_mod[ 0 ]['rubro_correo'];
    document.getElementById('telefono').value = data_mod[ 0 ]['n_telefono'];
    document.getElementById('rubro_telefono').value = data_mod[ 0 ]['rubro_telefono'];
    document.getElementById('t_telefonia').value = data_mod[ 0 ]['telefonia'];

    var correo = [ data_mod[ 0 ]['dir_correo']];
    var rubro_correo = [ data_mod[ 0 ]['rubro_correo']];
    var telefono = [ data_mod[ 0 ]['n_telefono']];
    var rubro_telefono = [ data_mod[ 0 ]['rubro_telefono']];
    var telefonia = [ data_mod[ 0 ]['telefonia']];
    
    if( tam >= 2 ) {
        for( var i = 1; i < tam; ++i ){
            if( correo.indexOf( data_mod[ i ]['dir_correo']) == -1 ){
                crear_correo();
                correo.push( data_mod[ i ]['dir_correo']);
                rubro_correo.push( data_mod[ i ]['rubro_correo']);
            }
        }

        for( var i = 1; i < correo.length; ++i ){
            var dir_correo = "correo" + i;
            var rub_correo = "rubro_correo" + i;
            document.getElementById( dir_correo ).value = correo[ i ];
            document.getElementById( rub_correo ).value = rubro_correo[ i ];
        }
        
        for( var i = 1; i < tam; ++i ){
            if( telefono.indexOf( data_mod[ i ]['n_telefono']) == -1 ){
                crear_telefono();
                telefono.push( data_mod[ i ]['n_telefono']);
                rubro_telefono.push( data_mod[ i ]['rubro_telefono']);
                telefonia.push( data_mod[ i ]['telefonia']);
            }
        }

        for( var i = 1; i < telefono.length; ++i ){
            var telef = "telefono" + i;
            var rub_telefono = "rubro_telefono" + i;
            var telenia = "telefonia" + i;
            document.getElementById( telef ).value = telefono[ i ];
            document.getElementById( rub_telefono ).value = rubro_telefono[ i ];
            document.getElementById( telenia ).value = telefonia[ i ];
        }
    }
};

function enviar() {
    var nombre_mod = document.getElementById('nombre_mod').value;
    var apellido_mod = document.getElementById('p_apellido_mod').value;
    var datos = "nombre="+nombre_mod+"&apellido="+apellido_mod;
    $.ajax({
        type: 'POST',
        url: "php/modificarDB.php",
        data: datos,
        success: function( response ) {
            if( response == "0") {
                alert("No se encontro persona");
            } else {
                var data_mod = JSON.parse( response );
                modificar_data( data_mod );
            }
        }, error: function( response, status, error ) {
            alert("No encontrado");
        }
    });
    return false;
}


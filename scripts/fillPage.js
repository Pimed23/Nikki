/*cargar_personas = function( personas ) {
    
};*/

function multiDimensionalUnique(arr) {
    var uniques = [];
    var itemsFound = {};
    for(var i = 0, l = arr.length; i < l; i++) {
        var stringified = JSON.stringify(arr[i]);
        if(itemsFound[stringified]) { continue; }
        uniques.push(arr[i]);
        itemsFound[stringified] = true;
    }
    return uniques;
}

cargar_personas = function( personas ) {
    var cant_personas = [];
    var acum = 0;
    var name = personas[ 0 ]['nombre'];
    for( var i = 0; i < personas.length; ++i ) {
        if( personas[ i ]['nombre'] == name ) {
            ++acum;
        } else {
            cant_personas.push( acum );
            acum = 1;
            name = personas[ i ]['nombre'];
        }
    }

    cant_personas.push( acum );

    // CARGAR PERSONAS ARRAY
    var tot_personas = new Array();
    var acc = 0;
    var lim = 0;
    for( var i = 0; i < cant_personas.length; ++i ) {
        lim = cant_personas[ i ] + lim;
        for( var j = acc; j < personas.length; ++j ) {
            if( j < lim ) {
                nom_per = personas[j]['nombre'];
                pap_per = personas[j]['p_apellido'];
                sap_per = personas[j]['s_apellido'];
                fec_nac = personas[j]['fech_nac'];
                dep_per = personas[j]['departamento'];
                dis_per = personas[j]['distrito'];
                dir_per = personas[j]['direccion'];
                img_per = personas[j]['imagen'];

                tot_personas.push([ i, nom_per, pap_per, sap_per, fec_nac, dep_per, dis_per, dir_per, img_per ]);
                ++acc;
            }
        }
    }

    final_persona = multiDimensionalUnique( tot_personas );
    console.log( final_persona );
    
    // CARGAR CORREOS ARRAY
    var tot_correo = new Array();
    var acc = 0;
    var lim = 0;
    for( var i = 0; i < cant_personas.length; ++i ) {
        lim = cant_personas[ i ] + lim;
        for( var j = acc; j < personas.length; ++j ) {
            if( j < lim ) {
                correo = personas[j]['dir_correo'];
                rubro_correo = personas[j]['rubro_correo']
                tot_correo.push([ i, correo, rubro_correo ]);
                ++acc;
            }
        }
    }
    
    final_correo = multiDimensionalUnique( tot_correo );
    console.log( final_correo );

    // CARGAR TELEFONOS
    var tot_telef = new Array();
    var acc = 0;
    var lim = 0;
    for( var i = 0; i < cant_personas.length; ++i ) {
        lim = cant_personas[ i ] + lim;
        for( var j = acc; j < personas.length; ++j ) {
            if( j < lim ) {
                telef = personas[j]['n_telefono'];
                rub_telef = personas[j]['rubro_telefono'];
                telefnia = personas[j]['telefonia'];

                tot_telef.push([ i, telef, rub_telef, telefnia ]);                
                ++acc;
            }
        }
    }   

    final_telef = multiDimensionalUnique( tot_telef );
    console.log( final_telef );

    for( var i = 0; i < final_persona.length; ++i ) {
        var bloque0 = '<div class="box-item"><div class="box-shadow-effect"><img class="box-image" src="pictures/'
        +final_persona[i][8]+'" alt=""><p class="box-text">'+final_persona[i][6]+', '+final_persona[i][5]
        +'</p><p class="box-text">Domicilio: '+final_persona[i][7]+'</p><p class="box-text">Fecha de nac.: '
        +final_persona[i][4]+'</p><p class="box-text">Correos:</p>';
        
        var bloque1 = '';

        for( var j = 0; j < final_correo.length; ++j ) {
            if((final_correo[j][0]) == i ) {
                bloque1 = '<p class="box-text">'+final_correo[j][1]+' - '+final_correo[j][2] +'</p>'+ bloque1; 
            }
        }

        var bloque2 = '<p class="box-text">Telefonos: </p>';
        var bloque3 = '';

        for( var j = 0; j < final_telef.length; ++j ) {
            if((final_telef[j][0]) == i ) {
                bloque3 = '<p class="box-text">'+final_telef[j][1]+' - '+final_telef[j][3] +'</p>'+ bloque3; 
            }
        }

        var bloque4 = '</div><div class="contact-name">'+final_persona[i][1]+' '+final_persona[i][2]+' '+final_persona[i][3]+'</div></div>';
        
        var bloque = bloque0 + bloque1 + bloque2 + bloque3 + bloque4;
        
        $('.box-contactos').append(bloque);
    }
   
}



function limpiar() {
    $("div").remove(".box-item, .box-shadow-effect");
    $("p").remove(".box-text");
    $("img").remove(".box-image");
}

$(document).ready(function(){
    var ajax = $.ajax({
        data: {},
        url: "php/recoverDB.php",
        type: 'POST',
        success: function( response ) {
            var personas = JSON.parse( response );
            cargar_personas( personas );
        },
        error: function(response, status, error) {
            alert("No encontrado");
        }
    });
});

$(function() {
    $('#filtro1').click( function(){
        var ajax = $.ajax({
            data: {},
            url: "php/filtro1.php",
            type: 'POST',
            success: function( response ) {
                var personas = JSON.parse( response );
                limpiar();
                cargar_personas( personas );
            },
            error: function(response, status, error) {
                alert("No encontrado");
            }
        });
    });
});

$(function() {
    $('#filtro2').click( function(){
        var ajax = $.ajax({
            data: {},
            url: "php/filtro2.php",
            type: 'POST',
            success: function( response ) {
                var personas = JSON.parse( response );
                limpiar();
                cargar_personas( personas );
            },
            error: function(response, status, error) {
                alert("No encontrado");
            }
        });
    });
});

$(function() {
    $('#filtro3').click( function(){
        var ajax = $.ajax({
            data: {},
            url: "php/filtro3.php",
            type: 'POST',
            success: function( response ) {
                var personas = JSON.parse( response );
                limpiar();
                cargar_personas( personas );
            },
            error: function(response, status, error) {
                alert("No encontrado");
            }
        });
    });
});

$(function() {
    $('#filtro4').click( function(){
        var ajax = $.ajax({
            data: {},
            url: "php/filtro4.php",
            type: 'POST',
            success: function( response ) {
                var personas = JSON.parse( response );
                limpiar();
                cargar_personas( personas );
            },
            error: function(response, status, error) {
                alert("No encontrado");
            }
        });
    });
});

$(function() {
    $('#filtro5').click( function(){
        var ajax = $.ajax({
            data: {},
            url: "php/filtro5.php",
            type: 'POST',
            success: function( response ) {
                var personas = JSON.parse( response );
                limpiar();
                cargar_personas( personas );
            },
            error: function(response, status, error) {
                alert("No encontrado");
            }
        });
    });
});
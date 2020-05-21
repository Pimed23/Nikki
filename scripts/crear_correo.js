inc_correo = 0;

function crear_correo() {
    inc_correo++;

    field_correo = document.getElementById('field1');
    // Container Input
    contenedor_correo = document.createElement('div');
    field_correo.appendChild( contenedor_correo );
    input_correo = document.createElement('input');
    input_correo.type = 'text';
    input_correo.name = 'correo' + inc_correo;
    input_correo.className = 'caja_flotante';
    input_correo.id = 'correo' + inc_correo;
    input_correo.placeholder = "Ingrese correo electronico " + inc_correo;
    contenedor_correo.appendChild( input_correo );

    // Container Select
    field_rubro_correo = document.getElementById('box1');
    contenedor_rubro_correo = document.createElement('div');
    field_rubro_correo.appendChild( contenedor_rubro_correo );
    select_rubro_correo = document.createElement('select');
    select_rubro_correo.id = 'rubro_correo' + inc_correo;
    select_rubro_correo.className = 'rubro_correo';
    select_rubro_correo.name = 'rubro_correo' + inc_correo;
    contenedor_rubro_correo.appendChild( select_rubro_correo );

    // Select Rubro_Correo Options
    option0_rubro_correo = document.createElement('option');
    option1_rubro_correo = document.createElement('option');
    option2_rubro_correo = document.createElement('option');

    option0_rubro_correo.value = "0";
    option1_rubro_correo.value = "Particular";
    option2_rubro_correo.value = "Trabajo";
    
    option0_rubro_correo.text = "Seleccione el rubro de correo " + inc_correo;
    option1_rubro_correo.text = "Particular";
    option2_rubro_correo.text = "Trabajo";
    
    select_rubro_correo.appendChild( option0_rubro_correo );
    select_rubro_correo.appendChild( option1_rubro_correo );
    select_rubro_correo.appendChild( option2_rubro_correo );
 
    contenedor_rubro_correo.appendChild( select_rubro_correo );
}
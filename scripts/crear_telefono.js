inc_telefono = 0;

function crear_telefono() {
    inc_telefono++;
 
    // Container Input Telefono
    field_telefono = document.getElementById('field2');
    contenedor_telefono = document.createElement('div');
    field_telefono.appendChild( contenedor_telefono );
    input_telefono = document.createElement('input');
    input_telefono.type = 'text';
    input_telefono.className = 'caja_flotante';
    input_telefono.name = 'telefono' + inc_telefono;
    input_telefono.id = 'telefono' + inc_telefono;
    input_telefono.placeholder = "Ingrese numero telefonico " + inc_telefono;
    contenedor_telefono.appendChild( input_telefono );

    // Container Select Rubro Telefono
    field_rubro_telefono = document.getElementById('box2');
    contenedor_rubro_telefono = document.createElement('div');
    field_rubro_telefono.appendChild( contenedor_rubro_telefono );
    select_rubro_telefono = document.createElement('select');
    select_rubro_telefono.id = 'rubro_telefono' + inc_telefono;
    select_rubro_telefono.className = 'rubro_telefono';
    select_rubro_telefono.name = 'rubro_telefono' + inc_telefono;
    contenedor_rubro_telefono.appendChild( select_rubro_telefono );

    // Select Rubro_Correo Options
    option0_rubro_telefono = document.createElement('option');
    option1_rubro_telefono = document.createElement('option');
    option2_rubro_telefono = document.createElement('option');

    option0_rubro_telefono.value = "0";
    option1_rubro_telefono.value = "Particular";
    option2_rubro_telefono.value = "Trabajo";
    
    option0_rubro_telefono.text = "Seleccione el rubro de telefono " + inc_telefono;
    option1_rubro_telefono.text = "Particular";
    option2_rubro_telefono.text = "Trabajo";
    
    select_rubro_telefono.appendChild( option0_rubro_telefono );
    select_rubro_telefono.appendChild( option1_rubro_telefono );
    select_rubro_telefono.appendChild( option2_rubro_telefono );

    // Container Select Telefonia
    field_telefonia = document.getElementById('telefonia');
    contenedor_telefonia = document.createElement('div');
    field_telefonia.appendChild( contenedor_telefonia );
    select_telefonia = document.createElement('select');
    select_telefonia.id = 'telefonia' + inc_telefono;
    select_telefonia.className = 'telefonia';
    select_telefonia.name = 'telefonia' + inc_telefono;
    contenedor_telefonia.appendChild( select_telefonia );

    // Select Rubro_Correo Options
    option0_telefonia = document.createElement('option');
    option1_telefonia = document.createElement('option');
    option2_telefonia = document.createElement('option');

    option0_telefonia.value = "0";
    option1_telefonia.value = "Movil";
    option2_telefonia.value = "Fijo";
    
    option0_telefonia.text = "Seleccione la telefonia " + inc_telefono;
    option1_telefonia.text = "Movil";
    option2_telefonia.text = "Fijo";
    
    select_telefonia.appendChild( option0_telefonia );
    select_telefonia.appendChild( option1_telefonia );
    select_telefonia.appendChild( option2_telefonia );
    
}

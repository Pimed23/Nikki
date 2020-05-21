<?php
    require("conectionDB.php");
    
    $conection = mysqli_connect( $db_host, $db_user, $db_pass );
    
    if( mysqli_connect_errno()) {
        echo "Fallo al conectar con la BD";
        exit();
    }
    
    mysqli_select_db( $conection, $db_name ) or die ("No se encuentra la BD");
    mysqli_set_charset( $conection, "utf8" );
    
    $query = "SELECT nombre, p_apellido, s_apellido, fech_nac, departamento, distrito, direccion, imagen, grupo, dir_correo, rubro_correo, Telefono.n_telefono, telefonia, rubro_telefono FROM Persona INNER JOIN Correo ON Persona.id_persona = Correo.id_persona INNER JOIN Persona_Telefono ON Persona.id_persona = Persona_Telefono.id_persona INNER JOIN Telefono ON Persona_Telefono.n_telefono = Telefono.n_telefono WHERE grupo = 'Estudios' ORDER BY nombre;";
    $result = mysqli_query( $conection, $query );

    $json_array = array();

    while( $row = mysqli_fetch_assoc($result)) {
        
        $json_array[] = $row;
    }

    echo( json_encode( $json_array));

?>
<?php
    require("conectionDB.php");
    
    $query = "SELECT nombre, p_apellido, s_apellido, fech_nac, departamento, distrito, direccion, imagen, grupo, dir_correo, rubro_correo, Telefono.n_telefono, telefonia, rubro_telefono FROM Persona INNER JOIN Correo ON Persona.id_persona = Correo.id_persona INNER JOIN Persona_Telefono ON Persona.id_persona = Persona_Telefono.id_persona INNER JOIN Telefono ON Persona_Telefono.n_telefono = Telefono.n_telefono ORDER BY nombre;";
    $result = mysqli_query( $conection, $query );

    $json_array = array();

    while( $row = mysqli_fetch_assoc($result)) {    
        $json_array[] = $row;
    }

    echo( json_encode( $json_array));
?>
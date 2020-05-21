<?php
    $nombre_mod = $_POST['nombre'];
    $p_apellido_mod = $_POST['apellido'];

    require("conectionDB.php");

    // Busca a la persona a modificar
    $query_mod = "SELECT nombre, p_apellido, s_apellido, fech_nac, grupo, departamento, distrito, direccion, imagen, dir_correo, rubro_correo, Telefono.n_telefono, rubro_telefono, telefonia FROM Persona INNER JOIN Correo ON Persona.id_persona = Correo.id_persona INNER JOIN Persona_Telefono ON Persona.id_persona = Persona_Telefono.id_persona INNER JOIN Telefono ON Persona_Telefono.n_telefono = Telefono.n_telefono WHERE nombre = '$nombre_mod' AND p_apellido = '$p_apellido_mod';";
    $get_data = mysqli_query( $conection, $query_mod );

    $json_array = array();
    while( $row = mysqli_fetch_assoc( $get_data )) {
        $json_array[] = $row;
    }

    if(!($json_array ))
        echo("0");
    else
        echo( json_encode( $json_array ));    

?>
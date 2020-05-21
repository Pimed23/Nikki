<?php
    require("conectionDB.php");

    $nombre = $_POST['nombre'];
    $apellido = $_POST['p_apellido'];

    $query = "SELECT id_persona FROM Persona WHERE nombre = '$nombre' AND p_apellido = '$apellido';";
    $get_id = mysqli_query( $conection, $query );
    $id_arr = mysqli_fetch_row( $get_id );
    $id_persona = $id_arr[ 0 ];

    $query = "DELETE FROM Correo WHERE id_persona = $id_persona";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "SELECT id_persona FROM Persona WHERE nombre = '$nombre' AND p_apellido = '$apellido';";
    $get_tel = mysqli_query( $conection, $query );
    $tel_arr = mysqli_fetch_row( $get_tel );
    $n_telefono = $tel_arr[ 0 ];

    $query = "DELETE FROM Persona_Telefono WHERE id_persona = $id_persona";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "DELETE FROM Telefono WHERE n_telefono = $n_telefono";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }   

    $query = "DELETE FROM Persona WHERE id_persona = $id_persona";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    header ("Location: http://localhost/Agenda/index.html");
?>
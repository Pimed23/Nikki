<?php
    $nombre = $_POST['nombre'];
    $p_apellido = $_POST['p_apellido'];

    $s_apellido = $_POST['s_apellido'];
    $fech_nac = $_POST['fech_nac'];
    $departamento = $_POST['departamento'];
    $distrito = $_POST['distrito'];
    $direccion = $_POST['direccion'];
    $grupo = $_POST['grupo'];
    $image_name = $_FILES['imagen']['name'];

    $correo = $_POST['mail'];
    $rubro_correo = $_POST['rubro_correo'];

    $n_telefono = $_POST['telefono'];
    $rubro_telefono = $_POST['rubro_telefono'];
    $telefonia = $_POST['telefonia'];

    $correo1 = $_POST['correo1'];
    $correo2 = $_POST['correo2'];
    $correo3 = $_POST['correo3'];

    $rubro_correo1 = $_POST['rubro_correo1'];
    $rubro_correo2 = $_POST['rubro_correo2'];
    $rubro_correo3 = $_POST['rubro_correo3'];

    $n_telefono1 = $_POST['telefono1'];
    $n_telefono2 = $_POST['telefono2'];
    $n_telefono3 = $_POST['telefono3'];

    $rubro_telefono1 = $_POST['rubro_telefono1'];
    $rubro_telefono2 = $_POST['rubro_telefono2'];
    $rubro_telefono3 = $_POST['rubro_telefono3'];

    $telefonia1 = $_POST['telefonia1'];
    $telefonia2 = $_POST['telefonia2'];
    $telefonia3 = $_POST['telefonia3'];

    $tot_correos = [ $correo, $correo1, $correo2, $correo3 ];
    $tot_rubro_correo = [ $rubro_correo, $rubro_correo1, $rubro_correo2, $rubro_correo3 ];
    $tot_telef = [ $n_telefono, $n_telefono1, $n_telefono2, $n_telefono3 ];
    $tot_rubro_telef = [ $rubro_telefono, $rubro_telefono1, $rubro_telefono2, $rubro_telefono3 ];
    $tot_telefonia = [ $telefonia, $telefonia1, $telefonia2, $telefonia3 ];

    $tot_correos_length = 0;
    $tot_telef_length = 0;

    while( $tot_correos[ $tot_correos_length ] != "" ) { 
        ++$tot_correos_length;
    }

    while( $tot_telef[ $tot_telef_length ] != "" ) { 
        ++$tot_telef_length;
    }

    if(isset($image_name) && $image_name != "") {
        $image_type = $_FILES['imagen']['type'];
        $image_tam = $_FILES['imagen']['size'];
        $temp_dest = $_FILES['imagen']['tmp_name'];
        $file_dest = $_SERVER['DOCUMENT_ROOT'].'/Agenda/pictures/';

        if(($tipo == "/Agenda/pictures/jpg" || $tipo == "/Agenda/pictures/jpge" || $tipo == "/Agenda/pictures/png") && ($tamano < 2000000)) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        } else {
            if(move_uploaded_file($temp_dest,$file_dest.$image_name)) {
                chmod($file_dest.$image_name, 0777);
                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            } else {
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
        $control = 1;
    } else {
        echo "No hay imagen para subir";
        $control = 0;
    }

    require("conectionDB.php");


    $query = "SELECT id_persona FROM Persona WHERE fech_nac = '$fech_nac';";
    $get_id = mysqli_query( $conection, $query );
    $id_arr = mysqli_fetch_row( $get_id );
    $id_persona = $id_arr[ 0 ];
    
    $query = "UPDATE Persona SET nombre = '$nombre' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "UPDATE Persona SET p_apellido = '$p_apellido' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el p_apellido :(");
    }

    $query = "UPDATE Persona SET s_apellido = '$s_apellido' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el s_apellido :(");
    }

    $query = "UPDATE Persona SET departamento = '$departamento' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "UPDATE Persona SET distrito = '$distrito' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "UPDATE Persona SET direccion = '$direccion' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "UPDATE Persona SET grupo = '$grupo' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    $query = "UPDATE Persona SET departamento = '$departamento' WHERE id_persona = '$id_persona';";
    if( mysqli_query( $conection, $query ) == false ) {
        echo("No se modifico el nombre :(");
    }

    if( $control ) {
        $query = "UPDATE Persona SET imagen = '$image_name' WHERE id_persona = '$id_persona';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
    }
    
    // CORREO DEL CONTACTO

    $query = "SELECT dir_correo FROM Correo WHERE id_persona = '$id_persona';";
    $get_dir = mysqli_query( $conection, $query );
    $i = 0;
    while( $dir_correo = mysqli_fetch_row( $get_dir )) {
        $query = "UPDATE Correo SET dir_correo = '$tot_correos[$i]' WHERE dir_correo = '$dir_correo[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }

        $query = "UPDATE Correo SET rubro_correo = '$tot_rubro_correo[$i]' WHERE dir_correo = '$dir_correo[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }

        ++$i;
    }

    while( $i < $tot_correos_length ) {
        $query = "INSERT INTO Correo( dir_correo, id_persona, rubro_correo ) VALUES ( '$tot_correos[$i]', '$id_persona', '$tot_rubro_correo[$i]');";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        ++$i;
    }

    while( $i > $tot_correos_length ) {
        $query = "DELETE FROM Correo WHERE dir_correo = '$dir_correo[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        --$i;
    }

    // TELEFONO DEL CONTACTO

    $query = "SELECT Telefono.n_telefono, telefonia, rubro_telefono FROM Persona INNER JOIN Persona_Telefono ON Persona.id_persona = Persona_Telefono.id_persona INNER JOIN Telefono ON Persona_Telefono.n_telefono = Telefono.n_telefono WHERE Persona.id_persona = '$id_persona';";
    $get_tel = mysqli_query( $conection, $query );

    $j = 0;
    while( $n_tel = mysqli_fetch_row( $get_tel )) {
        $query = "UPDATE Telefono SET n_telefono = '$tot_telef[$j]' WHERE n_telefono = '$n_tel[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        
        $query = "UPDATE Telefono SET rubro_telefono = '$tot_rubro_telef[$j]' WHERE n_telefono = '$n_tel[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }

        $query = "UPDATE Telefono SET telefonia = '$tot_telefonia[$j]' WHERE n_telefono = '$n_tel[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        
        ++$j;
    }

    while( $j < $tot_telef_length ) {
        $query = "INSERT INTO Telefono( n_telefono, rubro_telefono, telefonia ) VALUES ('$tot_telef[$j]','$tot_rubro_telef[$j]','$tot_telefonia[$j]');";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        
        $query = "INSERT INTO Persona_Telefono( n_telefono, id_persona ) VALUES ('$tot_telef[$j]','$id_persona');";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        ++$j;
    }


    while( $j > $tot_telef_length ) {
        $query = "DELETE FROM Persona_Telefono WHERE n_telefono = '$n_tel[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }

        $query = "DELETE FROM Telefono WHERE n_telefono = '$n_tel[0]';";
        if( mysqli_query( $conection, $query ) == false ) {
            echo("No se modifico el nombre :(");
        }
        --$j;
    }

    header ("Location: http://localhost/Agenda/index.html");
    
?>
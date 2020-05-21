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
    } else {
        echo "No hay imagen para subir";
        $image_name = "daniel.jpg";
    }

    require("conectionDB.php");

    $query0 = "SELECT dir_correo FROM Correo WHERE dir_correo = '$correo';";
    $res0 = mysqli_query( $conection, $query0 );
    $com0 = mysqli_fetch_row( $res0 );
    if( $com0[0] != NULL ) {
        echo "Este correo ya esta registrado...";
    } else {
        $query1 = "SELECT id_persona FROM Persona WHERE nombre = '$nombre' AND p_apellido = '$p_apellido' AND s_apellido = '$s_apellido' AND fech_nac = '$fech_nac' AND departamento = '$departamento' AND distrito = '$distrito' AND direccion = '$direccion';";
        $res1 = mysqli_query( $conection, $query1 );
        $com1 = mysqli_fetch_row( $res1 );
        
        if( $com1[0] != NULL ) {
            echo "Este usuario ya se encuentra registrado...";
        } else {
            $query2 = "INSERT INTO Persona( nombre, p_apellido, s_apellido, fech_nac, departamento, distrito, direccion, imagen, grupo ) VALUES ('$nombre', '$p_apellido', '$s_apellido', '$fech_nac', '$departamento', '$distrito', '$direccion', '$image_name', '$grupo' );";
            if( mysqli_query( $conection, $query2 ) == false ) {
                echo "No se inserto el usuario :(";
            }
            
            $query3 = "SELECT id_persona FROM Persona WHERE nombre = '$nombre' AND p_apellido = '$p_apellido' AND s_apellido = '$s_apellido' AND fech_nac = '$fech_nac' AND departamento = '$departamento' AND distrito = '$distrito' AND direccion = '$direccion';";
            $res2 = mysqli_query( $conection, $query3 );
            $id_persona = mysqli_fetch_row( $res2 );

            $query4 = "INSERT INTO Correo( dir_correo, id_persona, rubro_correo ) VALUES ('$correo','$id_persona[0]','$rubro_correo');";
            if( mysqli_query( $conection, $query4 ) == false ) {
                echo "No se inserto el correo :(";
            }

            if( $correo1 != "" ) {
                $query_aux1 = "INSERT INTO Correo( dir_correo, id_persona, rubro_correo ) VALUES ('$correo1','$id_persona[0]','$rubro_correo1');";
                if( mysqli_query( $conection, $query_aux1 ) == false ) {
                    echo "No se inserto el correo 1 :(";
                }
            }

            if( $correo2 != "" ) {
                $query_aux2 = "INSERT INTO Correo( dir_correo, id_persona, rubro_correo ) VALUES ('$correo2','$id_persona[0]','$rubro_correo2');";
                if( mysqli_query( $conection, $query_aux2 ) == false ) {
                    echo "No se inserto el correo 2 :(";
                }
            }

            if( $correo3 != "" ) {
                $query_aux3 = "INSERT INTO Correo( dir_correo, id_persona, rubro_correo ) VALUES ('$correo3','$id_persona[0]','$rubro_correo3');";
                if( mysqli_query( $conection, $query_aux3 ) == false ) {
                    echo "No se inserto el correo :(";
                }
            }
            
            $query5 = "INSERT INTO Telefono( n_telefono, telefonia, rubro_telefono ) VALUES ('$n_telefono','$telefonia','$rubro_telefono');";
            if( mysqli_query( $conection, $query5 ) == false ) {
                echo "No se inserto telefono :(";
            }

            if( $n_telefono1 != "" ) {
                $query_aux4 = "INSERT INTO Telefono( n_telefono, telefonia, rubro_telefono ) VALUES ('$n_telefono1','$telefonia1','$rubro_telefono1');";
                if( mysqli_query( $conection, $query_aux4 ) == false ) {
                    echo "No se inserto el telefono 1 :(";
                } else {
                    $query_aux7 = "INSERT INTO Persona_Telefono( id_persona, n_telefono ) VALUES ('$id_persona[0]','$n_telefono1');";
                    if( mysqli_query( $conection, $query_aux7 ) == false ) {
                        echo "No se vinculo el telefono 1 :(";
                    }
                }
            }

            if( $n_telefono2 != "" ) {
                $query_aux5 = "INSERT INTO Telefono( n_telefono, telefonia, rubro_telefono ) VALUES ('$n_telefono2','$telefonia2','$rubro_telefono2');";
                if( mysqli_query( $conection, $query_aux5 ) == false ) {
                    echo "No se inserto el telefono 2 :(";
                } else {
                    $query_aux8 = "INSERT INTO Persona_Telefono( id_persona, n_telefono ) VALUES ('$id_persona[0]','$n_telefono2');";
                    if( mysqli_query( $conection, $query_aux8 ) == false ) {
                        echo "No se vinculo el telefono 2 :(";
                    }
                }
            }

            if( $n_telefono3 != "" ) {
                $query_aux6 = "INSERT INTO Telefono( n_telefono, telefonia, rubro_telefono ) VALUES ('$n_telefono3','$telefonia3','$rubro_telefono3');";
                if( mysqli_query( $conection, $query_aux6 ) == false ) {
                    echo "No se inserto el telefono 3 :(";
                } else {
                    $query_aux9 = "INSERT INTO Persona_Telefono( id_persona, n_telefono ) VALUES ('$id_persona[0]','$n_telefono3');";
                    if( mysqli_query( $conection, $query_aux9 ) == false ) {
                        echo "No se vinculo el telefono 3 :(";
                    }
                }
            }
            
            $query6 = "INSERT INTO Persona_Telefono( id_persona, n_telefono ) VALUES ('$id_persona[0]','$n_telefono');";
            if( mysqli_query( $conection, $query6 ) == false ) {
                echo "No se conectaron las tablas :(";
            }
        }
    }

    header ("Location: http://localhost/Agenda/index.html");
//  echo $nombre.$p_apellido.$s_apellido.$fech_nac.$departamento.$distrito.$direccion.$grupo;
?>
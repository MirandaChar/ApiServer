<?php

include_once 'Usuario.php';

class ApiMiPrimeraApp{


    function getAll(){
        $usuario = new Usuario();
        $usuarios = array();
        $usuarios["items"] = array();

        $res = $usuario->obtenerUsuarios();
        
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){

                $item=array(
                    "id" => $row['id_email'],
                    "nombre" => $row['nombre'],
                    "pwd" => $row['password'],
                    "telefono" => $row['telefono'],
                );
                array_push($usuarios["items"], $item);
            }

            echo json_encode($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getFavoritos($id_email){
        $usuario = new Usuario();
        $usuarios = array();
        $usuarios["songs"] = array();

        //echo "Estoy en metodo: getFavoritos($id_email)";
        $res = $usuario->obtenerFavoritos($id_email);
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $song=array(
                    "id_email" => $row['id_email'],
                    "id_track" => $row['id_track'],
                    "name_track" => $row['name_track'],
                    "album_name" => $row['album_name'],
                    "artist_name" => $row['artist_name'],
                    "track_time_millis" => $row['track_time_millis']
                );
                array_push($usuarios["songs"], $song);
            }

            echo json_encode($usuarios);
        }else {
                
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}






/*    $usuario = new Usuario();
    $usuarios = array();
    $usuarios["songs"] = array();

    $res = $usuario->obtenerFavoritos($id_email);
    if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $song=array(
                    "id_email" => $row['id_email'],
                    "id_track" => $row['id_track'],
                    "name_track" => $row['name_track'],
                    "album_name" => $row['album_name'],
                    "artist_name" => $row['artist_name'],
                    "track_time_millis" => $row['track_time_millis'],
                );
                array_push($usuarios["songs"], $song);
            }

            echo json_encode($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}*/
?>
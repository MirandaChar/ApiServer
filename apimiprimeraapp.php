<?php

include_once 'usuario.php';

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
                    "direccion" => $row['direccion'],
                    "telefono" => $row['telefono'],
                );
                array_push($usuarios["items"], $item);
            }
        
            echo json_encode($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}

?>
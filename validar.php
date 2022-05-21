<?php

include_once 'Usuario.php';
include_once 'DB.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$pwd = $data['pwd'];


$sql = "SELECT * FROM `usuarios` WHERE `id` = '$id' and `pwd` = '$pwd'";
$usuario = new Usuario();

$res = $usuario->validarUsuario($sql);

if($res->rowCount()){
    while ($row = $res->fetch(PDO::FETCH_ASSOC)){

        $item=array(
            "id" => $row['id'],
            "nombre" => $row['nombre'],
            "pwd" => $row['pwd'],
            "telefono" => $row['telefono'],
        );
        echo json_encode($item);
    }
}else{
    echo json_encode(array('codigo' => 405));
}
?>
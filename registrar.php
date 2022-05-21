<?php

include_once 'Usuario.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nombre = $data['nombre'];
$pwd = $data['pwd'];
$telefono = $data['telefono'];

$sql = "INSERT INTO `usuarios` (`id`, `pwd`, `nombre`, `telefono`) VALUES ('$id', '$pwd', '$nombre', '$telefono')";
$usuario = new Usuario();

$res = $usuario->registrarUsuario($sql);

?>
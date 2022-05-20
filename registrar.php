<?php

include_once 'usuario.php';

$data = json_decode(file_get_contents("php://input"), true);
  
// Display data

$id_email = $data['id'];
$nombre = $data['nombre'];
$direccion = $data['direccion'];
$telefono = $data['telefono'];

$sql = "INSERT INTO `usuario` (`id_email`, `password`, `nombre`, `direccion`, `telefono`) VALUES ('$id_email', '12345678a', '$nombre', '$direccion', '$telefono')";


$usuario = new Usuario();

$res = $usuario->registrarUsuario($sql);

?>
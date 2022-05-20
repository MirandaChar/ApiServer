<?php

include_once 'usuario.php';

$data = json_decode(file_get_contents("php://input"), true);
  
// Display data

$id_email = $data['id_email'];
$id_track = $data['id_track'];
$name_track = $data['name_track'];
$album_name = $data['album_name'];
$artist_name = $data['artist_name'];
$track_time_millis = $data['track_time_millis'];

$sql = "INSERT INTO `musica_fav` (`id_emails`, `id_track`, `name_track`, `album_name`, `artist_name`, `track_time_milliqs`) VALUES ('$id_email', '$id_track', '$name_track', '$album_name', '$artist_name', '$track_time_millis')";


$usuario = new Usuario();

$res = $usuario->registrarUsuario($sql, "guardarCancionFav");

?>
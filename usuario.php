<?php

include_once 'DB.php';

class Usuario extends DB{
    
function obtenerUsuarios(){
    $query = $this->connect()->query('SELECT * FROM usuario order by nombre');
    return $query;
}

function obtenerFavoritos($id){
    //echo "SELECT * FROM musica_fav where `id_email` = '$id'";
    $query = $this->connect()->query("SELECT * FROM musica_fav where `id_email` = '$id'");
    return $query;
}

function registrarUsuario($sql){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "MiPrimeraBD";
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          // use exec() because no results are returned
          $conn->exec($sql);
          echo json_encode(array('mensaje' => 'succesfull'));
        } catch(PDOException $e) {
          echo json_encode(array('codigoError' => $e->getCode(), 'mensajeError' => $e->getMessage())); //$sql . "<br>" . $e->getMessage();
        }
        $conn = null;


}

function validarUsuario($sql){
        
    $query = $this->connect()->query($sql);
    return $query;
}

}

?>
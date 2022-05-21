<?php
    include_once 'ApiMiPrimeraApp.php';

	//include_once 'Usuario.php';
	$data = json_decode(file_get_contents("php://input"), true);
	$id_email = $data['id_email'];

    $api = new ApiMiPrimeraApp();

	//echo 'Consultar favoritos';
	//echo $id_email;
	
    $api->getFavoritos($id_email);
    
    /**/
?>
<?php  

	$base_path = $_SERVER['DOCUMENT_ROOT'].'/upImage/';
	$base_image_path = $base_path.'imagenes/';

	$host = "localhost";
	$db = "galeria";
	$usser = "manolo";
	$pass = "manolo";

	try{

		$pdo = new PDO('mysql:host='.$host.';dbname='.$db, $usser, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES utf8');

	}catch(PDOException $e){

		die('Error de conexión a la base de datos: '. $e->getMessage());

	}

	try {
		
		$sql = "SELECT * FROM fotos ORDER BY id DESC;";
		$ps = $pdo -> prepare($sql);
		$ps -> execute();

	} catch (PDOException $e) {
		
		die('Error de conexión a la base de datos: '. $e->getMessage());

	}

	while($row = $ps->fetch(PDO::FETCH_ASSOC)) {

		$fotos [] = $row;

	}

	require_once 'index.html.php';

?>
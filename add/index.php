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

	if ( isset($_GET['add']) ) {
		//Guardamos en la base de datos
		$title = $_POST['title'];
		//$_FILES
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$file_error =$_FILES['image']['error'];

		//Guardar en la base de datos
		try {
			
			$sql = "INSERT INTO fotos (title, name) VALUES (:title, :name);";

			$ps = $pdo -> prepare($sql);
			$ps -> bindValue(':title', $title);
			$ps -> bindValue(':name', $file_name);

			$ps -> execute();

		} catch (PDOException $e) {
			
			die('Error, no es posible subir la imagen : '. $e->getMessage());

		}

		//Mover archivos desde el directorio subido hasta el directorio imagenes
		move_uploaded_file($file_tmp, $base_image_path.$file_name);

	}else{

		require_once 'index.html.php';

	}

?>
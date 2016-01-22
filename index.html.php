<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de imágenes</title>
</head>
<body>
	<h1>Lista de imágenes</h1>
	<?php foreach ($fotos as $foto) : ?>
		<h2><?=$foto['title']?></h2>
		<img style="width:200px" src="<?php echo 'http://localhost:8080/upImage/imagenes'.$foto['name'] ?>" alt="Foto">
	<?php endforeach ;?>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Añadir imagen</title>
</head>
<body>
	<h1>Subir imagen</h1>
	<form action="?add" method="POST" enctype="multipart/form-data">
	<div>
		<label for="title">Título:</label>
		<input type="text" name="title">
	</div>
	<div>
		<label for="image">Imagen:</label>
		<input type="file" id="image" name="image">
	</div>
	<div>
		<button type="submit">Enviar</button>
	</div>	
	</form>
</body>
</html>
<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>



<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//incluyendo el archivo de conexión a la base de datos
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['titulo'];
	$qty = $_POST['descrip'];
	$price = $_POST['enlaces'];
	$loginId = $_SESSION['id'];
		
	// revisando campos vacios
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>El campo de TITULO está vacío.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>El campo de DESCRIPCION está vacío.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>El campo de ENLACES está vacío.</font><br/>";
		}
		
		//enlace a la página anterior
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		// si todos los campos están llenos (no vacíos) 
			
		//insertar datos en la base de datos	
		$result = mysqli_query($mysqli, "INSERT INTO products(titulo, descrip, enlaces, login_id) VALUES('$name','$qty','$price', '$loginId')");
		
		//Mostrar mensaje de éxito
		echo "<font color='green'>Datos añadidos con éxito.";
		echo "<br/><a href='view.php'>Ver resultado</a>";
	}
}
?>
</body>
</html>

<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>


<?php
//incluyendo el archivo de conexión a la base de datos
//include_once se puede utilizar en casos donde el mismo
// fichero podría ser incluido y evaluado más de una vez durante
// una ejecución particular de un script, así que en este caso, puede
//ser de ayuda para evitar problemas como la redefinición de funciones,
//reasignación de valores de variables, etc. 


include_once("connection.php");
//UPDATE se utiliza para alterar o modificar los registros existentes
//en una tabla que quizá al momento de guardar nos olvidamos de corregir algo

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$name = $_POST['titulo'];
	$qty = $_POST['descrip'];
	$price = $_POST['enlaces'];	
	
	// revisando campos vacios
	if(empty($name) || empty($qty) || empty($price)) {
		
		if(empty($name)) {
			echo "<font color='red'>El campo de TITULO está vacío.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>El campo DESCRIPCION está vacío.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>El campo de ENLACES está vacío.</font><br/>";
		}		
	} else {	
		//actualizando la tabla
		$result = mysqli_query($mysqli, "UPDATE products SET titulo='$name', descrip='$qty', enlaces='$price' WHERE id=$id");
		
		//redirigir a la página de visualización. En nuestro caso, es view.php
		header("Location: view.php");
	}
}
?>
<?php
//obteniendo id de url
$id = $_GET['id'];

//seleccionando datos asociados con esta identificación en particular
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['titulo'];
	$qty = $res['descrip'];
	$price = $res['enlaces'];
	
}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Ir a pagima principal</a> | <a href="view.php">Ver productos</a> | <a href="./login.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Titulo</td>
				<td><input type="text" name="titulo" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Descripción</td>
				<td><input type="text" name="descrip" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Enlaces</td>
				<td><input type="text" name="enlaces" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>

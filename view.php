<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//incluyendo el archivo de conexión a la base de datos
include_once("connection.php");

//obteniendo datos en orden descendente (la última entrada primero)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>página principal</title>
</head>

<body>
	<a href="index.php">Ir a pagina principal </a> | <a href="add.html">Agregar nuevos datos</a> | <a href="./login.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Titulo</td>
			<td>Descripción</td>
			<td>Enlaces</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['titulo']."</td>";
			echo "<td>".$res['descrip']."</td>";
			echo "<td>".$res['enlaces']."</td>";
			//echo "<td>".$res['id']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estás segura de que quieres eliminar?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>

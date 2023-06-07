<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="./css/style_login.css">
</head>

<body>
<div id ="principal">
	<div id = "camposnulos">
		<?php
		include("connection.php");

		if(isset($_POST['submit'])) {
			$user = mysqli_real_escape_string($mysqli, $_POST['username']);
			$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

			if($user == "" || $pass == "") {
				echo "<h2><font color='red'>El campo de nombre de usuario o contraseña está vacío.</h2>";
				echo "<br/>";
				echo "<a href='login.php'><font size='12px'>Regresar</a>";
			} else {
				$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
							or die("No se pudo ejecutar la consulta de selección.");
				
				$row = mysqli_fetch_assoc($result);
				
				if(is_array($row) && !empty($row)) {
					$validuser = $row['username'];
					$_SESSION['valid'] = $validuser;
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
				} else {
					echo "<h2><font color='red'>Nombre de usuario o contraseña inválidos.<h2>";
					echo "<br/>";
					echo "<a href='login.php'><font size='12px'>Regresar</a>";
				}

				if(isset($_SESSION['valid'])) {
					header('Location: index.php');			
				}
			}
		} else {
		?>
	</div>

	<div id="parrafo">
		<h1>Login</h1>
	</div>	
	<div id ="formulario">
		<form name="form1" method="post" action="">
			<table width="55%" border="0">
				<tr> 
					<td class="datosUP">Username</td>
					<td ><input class="input"  type="text" name="username"></td>
				</tr>
				<tr> 
					<td class="datosUP" >Password</td>
					<td ><input  class="input" type="password" name="password"></td>
				</tr>
				<tr> 
					<td>&nbsp;</td>
					<td><input  class="ingreso" type="submit" name="submit" value="Ingresar"></td>
				</tr>
			</table>
		</form>
	</div>	
	<?php
	}
	?>
	<div id ="footer">	
		<a class="enlace" href="index.php">Ir a pagina principal</a> <br />
	</div>
</div>	
</body>
</html>

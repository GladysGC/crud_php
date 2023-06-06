<?php session_start(); ?>
<html>
<head>
	<title>Lista de Apuntes</title>
	
	<style>
body {
	background: url(./image/mano.jpg);
	background-size: cover;
	
	
}

#principal{
	width: 40%;
	padding-top: 5rem;
	margin: auto;
	flex-wrap: wrap;
	display: flex;
	justify-content: center;		
}
#header, #cuerpo {
	width: 700px;
	color: maroon;
	font-size: 32px;
	padding: 10px 10px 10px 0px;
	margin-bottom: 15px;
	border-bottom: 1px solid green;
	text-align: center;
}
#cuerpo{
	padding: 10px 10px 10px 0px;
}
#footer {
	border-top: 1px solid green;
	margin-top: 20px;
	color: #336699;
	padding-top: 10px;	
}
.enlace{
	background-color: dceccf;
	width: 10rem;
	padding: .5rem;
	border-radius: 2rem;
	font-size: 25;
}
</style>
</head>

<body>
<div id="principal">

	<div id="header">
		<h1>Welcome !</h1>
	</div>
	<div id ="cuerpo">
		<?php
		if(isset($_SESSION['valid'])) {			
			include("connection.php");					
			$result = mysqli_query($mysqli, "SELECT * FROM login");
		?>
					
			<h2>Welcome <?php echo $_SESSION['name'] ?></h2> ! <a href='logout.php'>Logout</a><br/>
			<br/>
			<a href='view.php'>Ver y agregar productos</a>
			<br/><br/>
			<?php	
		}  else {
			?>
			<button class="enlace"><a href='login.php' >Login</a></button> &nbsp;&nbsp;&nbsp;
			<button class="enlace"><a href='register.php'>Register</a></button>
			<?php	
		}
		?>
	</div>
	<div id="footer">
		Created by <a href="https://www.linkedin.com/in/gladys-guanín-criollo-36ba80b7/" title="Link">Gladys Guanin</a>
	</div>
</div>	
</body>
</html>

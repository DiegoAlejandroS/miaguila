<?php
require 'conexion.php';

	$nombrefoto="fperfil_".$_FILES['fotos']['name'];
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	$nom=$_POST['nombre'];
	$f=$_POST['fecha'];
	$sexo=$_POST['sexo'];
	$query="SELECT * FROM usuario WHERE email='".$email."'";
	$checasiesta=$connect->query($query);
	$numfilas=$checasiesta->num_rows;
	if($numfilas==0){
		$insertar="INSERT INTO usuario VALUES('$email','$pass','".$f."','$nom','$sexo','$nombrefoto')";
		$ejecutar=$connect->query($insertar);
		mkdir("archivos/".$email);
		copy($_FILES['fotos']['tmp_name'],"archivos/".$email."/".$nombrefoto);
		echo "<script type='text/javascript'>alert('El Registro ha sido exitoso');</script>";
	}else{
		echo "<script type='text/javascript'>alert('No se encuentra disponible el email: ".$email." utiliza otro');</script>";
	}
?>
<html lang="es">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">

					<a href="registro.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>

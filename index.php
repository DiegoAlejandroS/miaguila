<?php
include('conexion.php');
session_start();
if(isset($_SESSION['usuario'])){
		header("Location: inicio.php");
}
if(isset($_REQUEST['iniciar']) && $_REQUEST['iniciar']=="ok"){
	$email=$_REQUEST['email'];
	$pass=md5($_REQUEST['password']);
	$query="SELECT * FROM usuario WHERE email='".$email."' AND pass='".$pass."'";
	$ver=$connect->query($query);
	$siesta=$ver->num_rows;
	if($siesta==1){
			$_SESSION['usuario']=$email;
			header("Location: inicio.php");
	}else{
		echo "<script type='text/javascript'>alert('Usuario o contraseña incorrecta');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="includes/images/logo.ico">
    <title>Blog Mi Águila Group</title>
	</head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="includes/images/miaguila.PNG" width="200"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div align="right" class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="registro.php">Registrarse</a>
      </li>
    </ul>
  </div>
</nav>
<div class="row">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

    <form action="index.php" method="REQUEST" class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin">
    <h2 class="w3-center">Inicio de sesión</h2>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="email" type="email" placeholder="Email" required>
        </div>
    </div>

    <div class="w3-row w3-section">
      <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
        <div class="w3-rest">
          <input class="w3-input w3-border" name="password" type="password" placeholder="Contraseña" required>
        </div>
    </div>
		<input type="hidden" name="iniciar" value="ok">
    <button class="w3-button w3-block w3-section w3-teal w3-ripple w3-padding">Ingresar</button>
    </form>
  </div>
  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <img src="includes/images/back.jpg" width="1028" height="572"/>
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="icon" href="includes/images/logo.ico">
		<title>Registro | Mi Águila Group</title>
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
        <a class="nav-link" href="index.php">Inicio</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="registro.php">Registrarse</a>
      </li>
    </ul>
  </div>
</nav>
    <h2>Registro</h2><hr><br>
      <form name="form2" action="guardarusu.php" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Email:</td>
            <td><input type="email" name="email" placeholder="Introduce Email" required></td>
          </tr>
          <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Introduce Password" required></td>
          </tr>
          <tr>
            <td>Nombre:</td>
            <td><input type="text" name="nombre" placeholder="Introduce tu Nombre" required></td>
          </tr>
            <tr>
            <td>Fecha de Nacimiento:</td>
            <td><input type="date" name="fecha" placeholder="Introduce tu Fecha" required></td>
          </tr>
            <tr>
            <td>Sexo:</td>
            <td><select name="sexo" placeholder="Selecciona tu sexo" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Foto:</td>
            <td><input type="file" name="fotos" placeholder="Introduce tu foto" required></td>
          </tr>
          <tr>
            <td><input type="hidden" name="nuevo" value="ok"><input type="hidden" name="status" value="nuevo"></td>
            <td><input type="submit" value="Registrar"></td>
          </tr>
        </table>
      </form>

<div class="row">
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

		</div>
		  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

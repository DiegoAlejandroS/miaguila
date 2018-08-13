<?php
include('conexion.php');
session_start();
if(isset($_GET['cerrar']) && $_GET['cerrar']=="ok"){
	session_destroy();
	header("Location: index.php");
}

if(!$_SESSION['usuario']){
header("Location: index.php");
}

?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="screen" href="includes/menus.css" />
		<link rel="icon" href="includes/images/logo.ico">
		<title>Blog</title>
		<link href="css/formularios.css" rel="stylesheet" type="text/css">
	</head>
	<style>
	.banner { background-color: black; }
	</style>
	<header>
		<div class="banner">
		     <div class="container">
		          <div class="column">
		               <div class="col-sm-4">

		               </div>
									 <div class="col-sm-4">
										 <img src="includes/images/miaguila.PNG" width="200" />
									 </div>
		               <div class="col-sm-4">
		              </div>
		        </div>
		    </div>
		</div>
	</header>
<body>
<table height="900" width="100%" >
	<tr>
		<td width="10%"  height="70"><h3>Blog Mi Águila Group</h3></td>
		<td width="60%"  height="70"></td>
		<td width="30%" height="70" align="right">
	<?php
	$query="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'";
	$us=$connect->query($query);
	$numfilas=$us->num_rows;
	if($numfilas==1){
		$array=$us->fetch_array();
		echo "<table  align='right'><tr><td rowspan='2'><img src='archivos/".$_SESSION['usuario']."/".$array['fotos']."' width='50' heigth='50' ></td>";
		echo "<td>".$array['nombre']."<td></tr>";
		echo "<tr><td align='right'><a href='inicio.php?cerrar=ok'>Cerrar Sesion</a></td></tr></table>";
	}else{
		echo "<center>Error</center>";
	}
	?>
	</td>
	</tr>
	<tr >
	<td width="10%" height="900"  valign="top" halign="center">	<div><ul><li><a href="inicio.php">Inicio</a></li></ul></div></td>
	<td width="60%" height="900" valign="top" halign="left">
<?php
	$numero=10;
	if(isset($_REQUEST['aumenta']) && $_REQUEST['aumenta']==1 ){
		$_SESSION['numero']=$_SESSION['numero']+$numero;
	}else{
		$_SESSION['numero']=10;
	}

	$tpub="SELECT publicaciones.idpub, publicaciones.email, publicaciones.texto,
	publicaciones.fecha, COUNT(comentarios.idcom) AS numcom,
	usuario.fotos, usuario.nombre FROM usuario INNER JOIN (publicaciones LEFT JOIN comentarios ON
	publicaciones.idpub=comentarios.idpub)ON publicaciones.email=usuario.email  GROUP BY publicaciones.idpub,
	publicaciones.texto,publicaciones.fecha ORDER BY publicaciones.fecha DESC LIMIT 0,".$_SESSION['numero'];

	$ej=$connect->query($tpub);
	$nf=$ej->num_rows;
	$tp=$ej->fetch_assoc();

	$user="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'";
	$ejuser=$connect->query($user);
	$nfuser=$ejuser->num_rows;
	$auser=$ejuser->fetch_assoc();


if(isset($_REQUEST['np']) && $_REQUEST['np']=="ok"){;
	$texto=$_REQUEST['texto'];
	$email=$_SESSION['usuario'];
	$f=$_REQUEST['fecha'];
	$insertar="INSERT INTO publicaciones VALUES( NULL, '$email','$texto',NULL)";
	echo $insertar;
	$ejecutar=$connect->query($insertar);
	header("Location: inicio.php");
}
if(isset($_REQUEST['nc']) && $_REQUEST['nc']=="ok"){
	$texto=$_REQUEST['comen'];
	$email=$_SESSION['usuario'];
	$idpub=$_REQUEST['idpub'];
	$insertar="INSERT INTO comentarios VALUES( NULL,$idpub,'$texto', '$email',NULL)";
	$ejecutar=$connect->query($insertar);
	header("Location: inicio.php");
}
?>
<form   name="form1" action="inicio.php" method="post" enctype="multipart/form-data">
	<table width="400" >
		<tr>
			<td align="right"><hr><textarea name="texto" cols=60 rows=4  placeholder="¿Qué estas pensando?" required></textarea></td>
		</tr>
		<tr>
			<td align="right">
				<input type="hidden" name="np" value="ok">
				<input type="hidden" name="fecha" value="">
				<input type="submit"   class="button button-blue" value="Publicar"></form><hr>
			</td>
		</tr>
	</table>
	<table width="500" align="left">
	<?php
	if($nf>0){
		do{
		?>
		<tr >
			<td align="right" width="40"   >
				<img src="archivos/<?php echo $tp['email']."/".$tp['fotos']; ?>" width="40" height="40">
			</td>
			<td >
				<p size="10" face="Arial Black" align="justify"><?php echo $tp['nombre']; ?>
				<small>
					<?php
					$date= $tp['fecha'];
					$sqldate=date('d / M / Y ',strtotime($date));
					$d=date('d',strtotime($date));
					$m=date('M',strtotime($date));
					$a=date('Y',strtotime($date));
					$sqldate2=date('h:i a',strtotime($date));
					echo " el ".$sqldate." a las: ".$sqldate2; ?>
				</small>
				</p>
			</td>
		</tr>
		<tr>
			<td colspan="2" bgcolor="#DBEBF6" ><p size="8" face="Arial" align="justify" ><?php echo $tp['texto'];?></p></td>
		</tr>
		<tr>
			<td align="left"  colspan="2"><b>Tienes <?php echo $tp['numcom']." "; ?>Comentarios</b><hr></td>
		</tr>
		<tr>
			<td align="right" width="40"></td>
			<td width="360">
				<table  width="100%" bgcolor="#F0F7FC"  >
					<?php
					$idp=$tp['idpub'];
					$coment="SELECT * FROM usuario LEFT JOIN comentarios ON (comentarios.email=usuario.email)WHERE comentarios.idpub=$idp ORDER BY comentarios.fecha ASC ";
					$ejcoment=$connect->query($coment);
					$nfcoment=$ejcoment->num_rows;
					$acoment=$ejcoment->fetch_assoc();
					if($nfcoment>0){
						do{
					?>
					<tr>
						<td valign="top" align="right"><img src="archivos/<?php echo $acoment['email']."/".$acoment['fotos']; ?>" width="25" height="25"></td>
						<td colspan="2" >
							<p  align="justify" style="font-size:12px" ><?php echo $acoment['nombre'];?>
							<small><?php $date= $acoment['fecha'];   $sqldate=date('d / M / Y ',strtotime($date));
							$d=date('d',strtotime($date));
							$m=date('M',strtotime($date));
							$a=date('Y',strtotime($date));
							$sqldate2=date('h:i a',strtotime($date)); echo "el ".$sqldate." a las: ".$sqldate2; ?></small></p>
							<p size="8" face="Arial" align="justify" ><i><?php echo $acoment['texto'];?></i></p>
						</td>
					</tr>
					<?php
						}while($acoment=$ejcoment->fetch_assoc());
					}
					?>
					<tr>
						<td align="right" width="40"><img src="archivos/<?php echo $auser['email']."/".$auser['fotos']; ?>" width="25" height="25"></td>
						<td valign="bottom" width="320">
							<form name="enviarcomentario" method="post" action="inicio.php">
							<textarea name="comen" cols=35 rows=1  placeholder="Que opinas" ></textarea>
						</td>
						<td valign="bottom"><input type="submit"  class="button button-blue" value="Comentar"></td>
							<input type="hidden" name="idpub" value="<?php echo $tp['idpub']; ?>">
							<input type="hidden" name="nc" value="ok"></form>
						</tr>
						</table>
						<hr>
					</td>
				</tr>
			<?php } while($tp=$ej->fetch_assoc());?>
				<tr>
				<td colspan="2" align="center">
					<a href="inicio.php?aumenta=1">MOSTRAR PUBLICACIONES ANTIGUAS</a>
				</td>
			</tr>
			<?php
			}else{
				echo "<tr><td colspan=2 align='center'>NO HAY PUBLICACIONES</td></tr>";
			} ?>
		</table>
	</body>
</html>

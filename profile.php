<?php
session_start();
require('fn/entorno.php');
valLogin();
?>
<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<?php headHtml(); ?>
	<body class="is-preload">

	<?php menu(); 
	require('fn/conexion.php');
	$objeto= new conexion();
	$objeto->conectar();
	
	if (isset($_POST['btnSave'])) {
		$nombre 	= htmlspecialchars($_POST["nombre"], ENT_QUOTES);
		$sexo 		= htmlspecialchars($_POST["sexo"], ENT_QUOTES);

		$arch = $_FILES["img"]["tmp_name"];
		if($arch)
		{
			$arch = $_FILES["img"]["tmp_name"];
			$size = $_FILES["img"]["size"];
			$type = $_FILES["img"]["type"];
			$name = $_FILES["img"]["name"];
			$trozos = explode(".", $_FILES["img"]["name"]);
			$ext = end($trozos);
			$nameDirec = "images/users/";
			$idUnico = time();
			$nameComplete = $idUnico.".".$ext;
			$ruta=$nameDirec.$nameComplete;
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg")
			{
				while(is_file($ruta))
				{
					$idUnico = time();
					$nameComplete = $idUnico . "-" . $nameComplete;
					$ruta=$nameDirec.$nameComplete;
				}
				move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
				
				$objeto->mantto("UPDATE usuarios SET nombre='$nombre', sexo=$sexo, imagen='$nameComplete' WHERE id_usuario=".$_SESSION['rifa']['id_usuario']);

				$_SESSION['rifa']['nombre']         = $nombre;
				$_SESSION['rifa']['sexo']           = $sexo;
				$_SESSION['rifa']['imagen']         = $nameComplete;
				
				$_SESSION['rifa']['msj']            = "Datos Guardados con exito";
				$_SESSION['rifa']['msjClass']       = "success";
				?><script>location.href="profile.php";</script><?php
			}
			else
			{
				$_SESSION['rifa']['msj']            = "Archivo no compatible";
				$_SESSION['rifa']['msjClass']       = "danger";
				echo "<script>
					location.href='profile.php';
				</script>";
				exit;
			}
		} else {
			$objeto->mantto("UPDATE usuarios SET nombre='$nombre', sexo=$sexo WHERE id_usuario=".$_SESSION['rifa']['id_usuario']);
			$_SESSION['rifa']['nombre']         = $nombre;
			$_SESSION['rifa']['sexo']           = $sexo;
			
			$_SESSION['rifa']['msj']            = "Datos Guardados con exito";
			$_SESSION['rifa']['msjClass']       = "success";
		}




	}

	?>

		<!-- Heading -->
			<div id="heading" >
				<h1>Mi Perfil</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<div class="imaUser">
							<?php
							if ($_SESSION['rifa']['imagen']!="") {
								?><div class="image_round" style="background-image: url(images/users/<?php echo $_SESSION['rifa']['imagen']; ?>)"></div><?php
							} else if ($_SESSION['rifa']['sexo']=="2") {
								?><div class="image_round" style="background-image: url(images/icon-Mujer.png)"></div><?php
							} else {
								?><div class="image_round" style="background-image: url(images/icon-Hombre.png)"></div><?php
							}
							?>
						</div>
						<header>
							<h2>Tus Datos Principales</h2>
						</header>
						<hr />
						<!-- <h3>Magna odio tempus commodo</h3> -->
						<form action="" name="formData" id="formData" method="POST" enctype="multipart/form-data">
                            <label style="text-align: left;">Nombrey Apellido</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['rifa']['nombre']; ?>" placeholder="Ingrese un nombre y apellido"
                                required>
							<br>
                            <label style="text-align: left;">Sexo<a href=""></a></label>
							<select name="sexo" id="sexo" required>
								<option value="1" <?php if($_SESSION['rifa']['sexo']==1) { echo "selected";}?> >Hombre</option>
								<option value="2" <?php if($_SESSION['rifa']['sexo']==2) { echo "selected";}?> >Mujer</option>
							</select>
							<br>
							<label style="text-align: left;">Agrega una Imagen (Opcional)<a href=""></a></label>
							<input type="file" name="img" id="img" value="" placeholder="Imagen" accept="image/*">
							<br>
                            <br>
                            <input type="submit" id="btnSave" name="btnSave" class="button primary" value="Guardar Cambios">
						</form>
					</div>
				</div>
			</section>

			<?php footerHtml(); ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
        $(document).ready(function () {

            setTimeout(function () {
                $(".float_msj").fadeOut();
            }, 2000);

        });
    </script>

	</body>
	<style>
	.imaUser {
		margin: 15px;
	}
	.imaUser img{
		margin: auto;
	}
	.image_round {
		background-color: #e0e0e0;
		/* background-image: url(images/navidad.jpg); */
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		height: 100px !important;
		width: 100px;
		border-radius: 100%;
		margin: auto;
	}
	</style>
</html>
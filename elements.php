<?php
session_start();
require('fn/entorno.php');
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
	$query=$objeto->mantto("Select * from usuarios WHERE id_nivel=2");

	?>

		<!-- Heading -->
			<div id="heading" >
				<h1>Nuestros Participantes</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<div class="row">
							<div class="col-12">
								<h3>Comparte con nosotros, en esta navidad</h3>
								<h4>Personas registradas</h4>
								<?php if($objeto->conteo($query)>0) { ?>
									<div class="table-wrapper">
										<table>
											<tbody>
												<?php while($fila = $objeto->arreglo($query) ) { ?>
												<tr>
													<td>
														<?php
														if ($fila['imagen']!="") {
															?><div class="image_round" style="background-image: url(images/users/<?php echo $fila['imagen']; ?>)"></div><?php
														} else if ($fila['sexo']=="2") {
															?><div class="image_round" style="background-image: url(images/icon-Mujer.png)"></div><?php
														} else {
															?><div class="image_round" style="background-image: url(images/icon-Hombre.png)"></div><?php
														}
														?>
													</td>
													<td class="text-justify">
														<?php 
															echo "<b>$fila[user_u]</b><br>";
															echo  ($fila['nombre']!="") ? "$fila[nombre]<br>" : '' ;
															echo  ($fila['desc_usuario']!="") ? "<small><i>$fila[desc_usuario]/i></small>" : '' ;
														?>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								<?php } else {
									?>
									<div class="table-wrapper">
										<table>
											<tbody>
												<tr>
													<td class="text-justify">
														<b>Actualmente no hay participantes</b>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<?php
								}?>	
							</div>
						</div>
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

	</body>
	<style>
	td{
		vertical-align: middle !important;	
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
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

    <?php menu(); ?>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Felices fiestas</h1>
            <p>En fechas navideñas siempre queremos recordar a nuestras familias y amigos, <br>demostrarles lo
                importantes y especiales que son para nosotros.</p>
        </div>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>Regístrate para nuestra rifa navideña</h2>
                <p>Queremos compartir un momento especial junto a todos nuestros familiares y amigos, por eso, queremos
                    que seas parte de ello.</p>

                    <br>
                    <p>Tiempo restante para la rifa</p>
                <div id="conteo">
                    <ul id="countdown">
                        <li> <span class="days">00</span>
                        <p class="timeRefDays">days</p>
                        </li>
                        <li> <span class="hours">00</span>
                        <p class="timeRefHours">hours</p>
                        </li>
                        <li> <span class="minutes">00</span>
                        <p class="timeRefMinutes">minutes</p>
                        </li>
                        <li> <span class="seconds">00</span>
                        <p class="timeRefSeconds">seconds</p>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="highlights">
                <section style="margin: auto;">
                    <div class="content">
                        <form action="" id="formLog" method="POST" enctype="multipart/form-data">.
                            <h3>Registrate o Inicia con tus datos</h3>
                            <label style="text-align: left;">Nombre de Usuario</label>
                            <input type="text" name="user" id="user" value="" placeholder="Ingrese un nombre de usuario"
                                required>
                            <div id="msjUser"></div>
                            <br>
                            <label style="text-align: left;">Contraseña<a href=""></a></label>
                            <input type="password" name="pass" id="pass" value="" placeholder="Ingrese una contraseña"
                                required>
                            <span class="msjError" id="msjPass"></span>
                            <br>
                            <!-- <label style="text-align: left;">Repetir Contraseña<a href=""></a></label>
							<input type="password" name="pass2" id="pass2" value="" placeholder="Repita contraseña" required>
							<br>
							<label style="text-align: left;">Agrega una Imagen (Opcional)<a href=""></a></label>
							<input type="file" name="image" id="image" value="" placeholder="Imagen" accept="image/*">
							<br>
							<br> -->
                            <input type="button" id="btnReg" name="btnReg" class="button primary" value="Registrarse">
                            <input type="button" id="btnlog" name="btnLog" class="button" value="Iniciar Sesion">
                            <header>
                            </header>
                            <br>
                            <p>No olvides los datos que has utilizado, te serviran para saber quien sera el afortunado
                                ganador de tu regalo de navideño.</p>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <div class="content">
                <section>
                    <h4>Nuestros mejores deseos para ti</h4>
                    <p>
                        Que la alegría de las fiestas se repitan todos los días del nuevo año que está por venir.
                        <br>Que la felicidad sea tu meta de cada día, y el amor de los tuyos, tu mejor recompensa.
                    </p>
                </section>
            </div>
            <div class="copyright">
                &copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a
                    href="https://coverr.co">Coverr</a>.
                <br> Created By Doncans
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/countdown.js"></script>
    <script>

        $(document).ready(function(){
            $("#countdown").countdown({
                date: "20 december 2019 17:00:00",
                format: "on"
            },

            function() {
                // callback function
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            function onFill() {
                if($("#user").val().length<3) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario valido</span>");
                } else {
                    $("#msjUser").html("");
                }
                if($("#pass").val().length<5) {
                    $("#msjPass").html("Ingrese una contraseña valida");
                } else {
                    $("#msjPass").html("");
                }
            }

            setTimeout(function () {
                $("#msjAlert").fadeOut();
            }, 1500);

            $("#btnReg").click(function (event) {
                var flag = 0;
                var user = $("#user").val();
                var pass = $("#pass").val();
                if($("#user").val().length==0) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario</span>");
                    $("#user").focus();
                    event.preventDefault();
                    flag++;
                }
                else if($("#user").val().length<3) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario valido</span>");
                    $("#user").focus();
                    event.preventDefault();
                    flag++;
                } else {
                    $("#msjUser").html("");
                }

                if($("#pass").val().length==0) {
                    $("#msjPass").html("Ingrese una contraseña");
                    $("#pass").focus();
                    event.preventDefault();
                    flag++;
                } else {
                    $("#msjPass").html("");
                }

                if  (pass.length<6) {
                    $("#msjPass").html("La contraseña es muy corta");
                    $("#pass").focus();
                    event.preventDefault();
                    flag++;
                } else {
                    $("#msjPass").html("");
                }

                if (flag==0) {
                    $("#msjUser").load("fn/verifi.php",{dato:user}, function(respuesta){
                        if (respuesta!=0) {
                            $("#msjUser").html("<span class='msjError'>El usuario ya existe</span>");
                            $("#user").focus();

                        } else {
                            $("#msjUser").html("");
                            $("#formLog").submit();
                        }
                    });
                }

            });

        });
    </script>

</body>
<style>
    .button {
        margin: 10px auto !important;
    }

    .msjError {
        text-align: left;
        color: brown;
    }

    .msjSuccess{
        text-align: left;
        color: darkgreen;
    }
</style>

</html>
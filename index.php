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

<?php headHtml();
if(isset($_POST['action'])) {
    $action = htmlspecialchars($_POST["action"], ENT_QUOTES);
    // $_SESSION['rifa']['name']
    require('fn/conexion.php');
    $objeto= new conexion();
    $objeto->conectar();

    $user = strtolower(htmlspecialchars($_POST["user"], ENT_QUOTES));
    $pass = md5(htmlspecialchars($_POST["pass"], ENT_QUOTES));

    $query=$objeto->mantto("Select * from usuarios WHERE user_u='".$user."'");

    if ($action==1) { // es registro
        if($objeto->conteo($query)==0) // registro
        {
            $newUser = "INSERT INTO usuarios (user_u, pass_u, id_nivel) VALUES ('$user', '$pass', '2');";
            $objeto->mantto($newUser);

            $querySearch=$objeto->mantto("Select * from usuarios WHERE user_u='$user' and pass_u='$pass'");
            if ($objeto->conteo($querySearch)==0) {
                $_SESSION['rifa']['msj']            = "Ups, algo ha salido mal...";
                $_SESSION['rifa']['msjClass']       = "danger";

            } else {
                $data = $objeto->arreglo($querySearch);
                $_SESSION['rifa']['session']        = "ok";
                $_SESSION['rifa']['id_usuario']     = $data['id_usuario'];
                $_SESSION['rifa']['user']           = $data['user_u'];
                $_SESSION['rifa']['nombre']         = $data['nombre'];
                $_SESSION['rifa']['sexo']           = $data['sexo'];
                $_SESSION['rifa']['imagen']         = $data['imagen'];
                $_SESSION['rifa']['asigned']        = $data['asigned'];
                $_SESSION['rifa']['msj']            = "Te has registrado con exito";
                $_SESSION['rifa']['msjClass']       = "success";
            }
        }
        else
        {
            $_SESSION['rifa']['msj']                = "El Usuario ya existe";
            $_SESSION['rifa']['msjClass']           = "danger";

        }
    } else if ($action==2) { // es login
        if($objeto->conteo($query)==1) // registro
        {
            $querySearch=$objeto->mantto("Select * from usuarios WHERE user_u='$user' and pass_u='$pass'");
            if ($objeto->conteo($querySearch)==0) {
                $_SESSION['rifa']['msj']            = "La Contraseña es incorrecta";
                $_SESSION['rifa']['msjClass']       = "danger";
            } else {
                $data = $objeto->arreglo($querySearch);
                $_SESSION['rifa']['session']        = "ok";
                $_SESSION['rifa']['id_usuario']     = $data['id_usuario'];
                $_SESSION['rifa']['user']           = $data['user_u'];
                $_SESSION['rifa']['nombre']         = $data['nombre'];
                $_SESSION['rifa']['sexo']           = $data['sexo'];
                $_SESSION['rifa']['imagen']         = $data['imagen'];
                $_SESSION['rifa']['asigned']        = $data['asigned'];
                $_SESSION['rifa']['msj']            = "Bienvenido ".$data['user_u'];
                $_SESSION['rifa']['msjClass']       = "success";
            }
        }
        else
        {
            $_SESSION['rifa']['msj']                = "Usuario no encontrado";
            $_SESSION['rifa']['msjClass']           = "danger";
        }
    }


}

?>

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
                    <p>La rifa sera el dia 20 de Diciembre a las 5:00 AM</p>
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
            <?php if(!isset($_SESSION['rifa']['session'])){ ?>
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
                            <input type="hidden" name="action" id="action" value="">

                            <!-- <input type="button" id="btnReg" name="btnReg" class="button primary" value="Registrarse"> -->

                            <input type="button" id="btnlogin" name="btnlogin" class="button" value="Iniciar Sesion">

                            <header>
                            </header>
                            <br>
                            <p>No olvides los datos que has utilizado, te serviran para saber quien sera el afortunado
                                ganador de tu regalo de navideño.</p>
                        </form>
                    </div>
                </section>
            </div>
            <?php } if(isset($_SESSION['rifa']['session'])) {
                if ($_SESSION['rifa']['nombre']=="") {
                    ?>
                    <a class="msjProfile" href="profile.php">Por favor, completa tus datos...</a>
                    <?php
                }
            }?>
        </div>
    </section>


    <?php footerHtml(); ?>

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
                date: "20 december 2019 5:00:00",
                format: "on"
            },

            function() {
                // callback function
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#btnlogin").click(function (event) {
                var flag = 0;
                var user = $("#user").val();
                var pass = $("#pass").val();
                if($("#user").val().length==0) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario</span>");
                    $("#user").focus();

                    flag++;
                }
                else if($("#user").val().length<3) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario valido</span>");
                    $("#user").focus();

                    flag++;
                } else {
                    $("#msjUser").html("");
                }

                if($("#pass").val().length==0) {
                    $("#msjPass").html("Ingrese una contraseña");
                    $("#pass").focus();

                    flag++;
                } else {
                    $("#msjPass").html("");
                }

                if  (pass.length<6) {
                    $("#msjPass").html("La contraseña es muy corta");
                    $("#pass").focus();

                    flag++;
                } else {
                    $("#msjPass").html("");
                }

                if (flag==0) {
                    $("#msjUser").html("");
                    $("#action").val("2");
                    $("#formLog").submit();
                }

            });

            setTimeout(function () {
                $(".float_msj").fadeOut();
            }, 2000);

            $("#btnReg").click(function (event) {
                var flag = 0;
                var user = $("#user").val();
                var pass = $("#pass").val();
                if($("#user").val().length==0) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario</span>");
                    $("#user").focus();
                    flag++;
                }
                else if($("#user").val().length<3) {
                    $("#msjUser").html("<span class='msjError'>Ingrese un usuario valido</span>");
                    $("#user").focus();

                    flag++;
                } else {
                    $("#msjUser").html("");
                }

                if($("#pass").val().length==0) {
                    $("#msjPass").html("Ingrese una contraseña");
                    $("#pass").focus();

                    flag++;
                } else {
                    $("#msjPass").html("");
                }

                if  (pass.length<6) {
                    $("#msjPass").html("La contraseña es muy corta");
                    $("#pass").focus();

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
                            $("#action").val("1");
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

    .msjProfile{
        display: block;
        margin: auto;
        margin-bottom: 25px;
        font-size: 22px;
        font-weight: bold;
    }
</style>

</html>
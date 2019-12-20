<?php
function headHtml() {
    ?>
    <head>
        <title>Rifa Navideña 2019</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="css/styles.css" />
        </head>
    </head>
    <?php
}

function menu() {
    ?>
    <!-- Header -->
    <header id="header">
        <a class="logo" href="index.php">Feliz Navidad</a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="elements.php">Participantes</a></li>
            <?php if(isset($_SESSION['rifa']['session'])) { ?>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php
    if(isset($_SESSION['rifa']['msj']) && $_SESSION['rifa']['msj']!="") {
        ?>
        <div class="float_msj <?php echo $_SESSION['rifa']['msjClass']?>">
            <?php echo $_SESSION['rifa']['msj']?>
        </div>
        <?php
        $_SESSION['rifa']['msj']        = "";
        $_SESSION['rifa']['msjClass']   = "";
    }
}

function footerHtml() {
    ?>
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
    <?php
}

function valLogin() {
    if(isset($_SESSION['rifa']['session']) && $_SESSION['rifa']['session'] = "ok") {
        
    } else {
        header("Status: 301 Moved Permanently");
        header("Location: ../index.php");
        exit;
    }
}
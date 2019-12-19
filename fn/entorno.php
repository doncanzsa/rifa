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
        <a class="logo" href="index.html">Feliz Navidad</a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="elements.html">Participantes</a></li>
            <?php if(isset($_SESSION['rifa']['session'])) { ?>
            <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>

    <?php
    if(isset($_SESSION['rifa']['msj']) && $_SESSION['rifa']['msj']!="") {
        ?>
        <div class="floatMsj <?php echo $_SESSION['rifa']['msjClass']?>">
            <?php echo $_SESSION['rifa']['msj']?>
        </div>
        <?php
        $_SESSION['rifa']['msj']        = "";
        $_SESSION['rifa']['msjClass']   = "";
    }
}

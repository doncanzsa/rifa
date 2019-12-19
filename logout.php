<?php
session_start();
$session="rifa";

if(!isset($_SESSION[$session]["session"]) or $_SESSION[$session]["session"]!="ok")
{
    $_SESSION['rifa']['msj'] = "Debes iniciar session";
    $_SESSION['rifa']['msjClass'] = "danger";
    ?><script>location.href="index.php";</script><?php
}

session_destroy();

unset($_SESSION[$session]["session"]);
unset($_SESSION[$session]["user"]);

session_start();
$_SESSION['rifa']['msj'] = "Vuelve pronto...";
$_SESSION['rifa']['msjClass'] = "info";
?>
<script>
location.href="index.php";
</script>

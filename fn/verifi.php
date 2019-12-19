<?php
session_start();
require('conexion.php');
$dato = htmlspecialchars($_POST["dato"], ENT_QUOTES);
$objeto= new conexion();
$objeto->conectar();

$query=$objeto->mantto("Select * from usuarios WHERE user_u='".$dato."'");
if($objeto->conteo($query)==0)
{
  echo "0";
}
else
{
  echo "1";
}
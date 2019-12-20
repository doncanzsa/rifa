<?php

require('fn/conexion.php');
$objeto= new conexion();
$objeto->conectar();
$query=$objeto->mantto("Select * from usuarios WHERE id_nivel=2");
while( $fila = $objeto->arreglo($query) ) {
    echo "Id: " . $fila['id_usuario'] . ", User: " .$fila['user_u'] ;
    if ($fila['asigned']) {
        echo ", Signed: " . $fila['asigned'];
    } else {
        echo "sin asignar: <br>";
        $queryAsig=$objeto->mantto("Select * from usuarios WHERE id_nivel=2 and is_asigned IS NULL and id_usuario!=".$fila['id_usuario']);
        $max = $objeto->conteo($queryAsig);
        $num = rand(0, $max);
        $index = 1;
        $ya=false;
        while( $filaPosibles = $objeto->arreglo($queryAsig) ) {
            if(!$ya) {
                if($index==$num) {
                    $idAsigned = $filaPosibles['id_usuario'];
                    echo "<br>";
                    echo $consul1 = "UPDATE usuarios SET asigned=".$idAsigned." WHERE id_usuario=".$fila['id_usuario'];
                    $objeto->mantto($consul1);
                    echo "<br>";
                    echo $consul2 = "UPDATE usuarios SET is_asigned=1 WHERE id_usuario=".$idAsigned;
                    $objeto->mantto($consul2);
                    echo ", Signed: " . $idAsigned;
                    $ya=true;
                } else {
                    $index++;
                }
            }
        }
    }
    echo "------------------------<br><br>";
}
<?php
$server_local=true;

if ($server_local) {
    return array(
        "driver"    =>"mysql",
        "host"      =>"localhost",
        "user"      =>"root",
        "pass"      =>"",
        "db"        =>"rifa",
        "charset"   =>"utf8mb4"
    );
} else {
    return array(
        "driver"    =>"mysql",
        "host"      =>"localhost",
        "user"      =>"root",
        "pass"      =>"Administrador 2019",
        "db"        =>"cedart_store",
        "charset"   =>"utf8mb4"
    );
}
?>
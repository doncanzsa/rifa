<?php
$server_local=false;

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
        "user"      =>"id11997907_rifa",
        "pass"      =>"rifa2019",
        "db"        =>"id11997907_rifa",
        "charset"   =>"utf8mb4"
    );
}
?>
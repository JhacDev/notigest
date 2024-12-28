<?php

require_once "global.php";

$conexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", "".DB_USERNAME."", "".DB_PASSWORD."", array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
));

?>
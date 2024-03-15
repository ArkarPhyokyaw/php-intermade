<?php
require_once "../app/configer/config.php";
require_once "../app/helper/helper.php";
// require_once "../app/libary/core.php";
// require_once "../app/libary/controller.php";
// require_once "../app/libary/database.php";

spl_autoload_register(function($className){
    require_once "../app/libary/".$className.".php";
}
);
?>
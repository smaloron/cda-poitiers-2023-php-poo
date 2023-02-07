<?php
function autoloader($className)
{
    require_once "classes/$className.php";
}

spl_autoload_register("autoloader");
<?php
function autoLoad($classname)
{
require_once $classname .'.php';

}
spl_autoload_register('autoLoad');
?>
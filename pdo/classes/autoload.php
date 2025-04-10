<?php
function load($classname)
{
require_once $classname .'.php';

}
spl_autoload_register('load');
?>
<?php
class ConnexionBD
{
private static $host = 'localhost';
private static $dbname = 'studentsmanagersystem';
private static $username = 'root';
private static $password = '';
private static $bd = null;
private function __construct(){
try{
    $dir = __DIR__.'/db.sqlite';
self::$bd=new PDO('sqlite:'.$dir);

} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
}
public static function getInstance()
{
    if (self::$bd === null) {
        new ConnexionBD();
    }
    return self::$bd;
}}
?>
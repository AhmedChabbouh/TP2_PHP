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
    self::$bd=new PDO('mysql:host='.self::$host.';dbname='.self::$dbname, self::$username, self::$password);

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
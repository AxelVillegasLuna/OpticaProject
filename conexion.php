<?php
$dsn = "mysql:dbname=optica;host=127.0.0.1;port:3306";
$user = "root";
$pass = "";

try{
    $db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
    die('Connection Failed: ' . $e->getMessage());
}

?>
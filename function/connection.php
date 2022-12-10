<?php
function connection(){
    $pdo = new PDO('mysql:dbname=dblivro', 'root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}//connection
?>
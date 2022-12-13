<?php
require 'connection.php';

function consultReaderId($codigo){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM leitor WHERE id = :codigo'); 
    $stmt -> bindValue(':codigo', $codigo);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultReaderId
?>

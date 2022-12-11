<?php
require 'connection.php';

function consultBookEstado(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT COUNT(estado) quantidade FROM livro GROUP BY estado;'); 
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultBookEstado
?>
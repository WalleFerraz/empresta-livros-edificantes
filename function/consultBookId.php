<?php
require 'connection.php';

function consultBookId($codigo){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro WHERE id = :id'); 
    $stmt -> bindValue(':id', $codigo);
    $stmt -> execute();
    return $stmt;
}//consultBookId
?>
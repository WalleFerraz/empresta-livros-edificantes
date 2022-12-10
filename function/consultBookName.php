<?php
require 'connection.php';

function consultBookName($nome){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro WHERE nomeLivro LIKE :nome%'); 
    $stmt -> bindValue(':nome', $nome);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultBookName
?>
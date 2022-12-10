<?php
require 'connection.php';

function consultReaderName($nome){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro WHERE nomeLeitor LIKE :nome%'); 
    $stmt -> bindValue(':nome', $nome);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultReaderName
?>

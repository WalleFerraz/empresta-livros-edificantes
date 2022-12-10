<?php
require 'connection.php';

function insertBook($nome, $autor, $descricao, $categoria, $paginas, $publico){
    $pdo = connection();
    $stmt = $pdo -> prepare('INSERT INTO livro VALUES(DEFAULT, :nome, :autor, :descricao, :categoria, :paginas, :publico, DEFAULT)'); 
    $stmt -> bindValue(':nome', $nome);
    $stmt -> bindValue(':autor', $autor);
    $stmt -> bindValue(':descricao', $descricao);
    $stmt -> bindValue(':categoria', $categoria);
    $stmt -> bindValue(':paginas', $paginas);
    $stmt -> bindValue(':publico', $publico);
    $stmt -> bindValue(':paginas', $paginas);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//insertBook
?>
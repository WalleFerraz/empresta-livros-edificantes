<?php
require 'connection.php';

function updateBook($id, $nome, $autor, $descricao, $categoria, $paginas, $publico, $estado){
    $pdo = connection();
    $stmt = $pdo -> prepare('UPDATE livro SET nomeLivro = :nome, autor = :autor, descricaoLivro = :descricao, categoria = :categoria, numeroPaginas = :paginas, publicoIndicado = :publico, estado = :estado WHERE id = :id'); 
    $stmt -> bindValue(':nome', $nome);
    $stmt -> bindValue(':autor', $autor);
    $stmt -> bindValue(':descricao', $descricao);
    $stmt -> bindValue(':categoria', $categoria);
    $stmt -> bindValue(':paginas', $paginas);
    $stmt -> bindValue(':publico', $publico);
    $stmt -> bindValue(':paginas', $paginas);
    $stmt -> bindValue(':estado', $estado);
    $stmt -> bindValue(':id', $id);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//updateBook
?>
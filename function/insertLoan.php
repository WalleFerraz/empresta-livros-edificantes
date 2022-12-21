<?php
require 'connection.php';

function insertLoan($idLivro, $idLeitor, $devolucao){
    $pdo = connection();
    $stmt = $pdo -> prepare('INSERT INTO emprestimo VALUES(DEFAULT, :livro, :leitor, DEFAULT, :devolucao)'); 
    $stmt -> bindValue(':livro', $idLivro);
    $stmt -> bindValue(':leitor', $idLeitor);
    $stmt -> bindValue(':devolucao', $devolucao);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//insertLoan

function updateBookEstado($id, $estado){
    $pdo = connection();
    $stmt = $pdo -> prepare('UPDATE livro SET estado = :estado WHERE id = :id'); 
    $stmt -> bindValue(':estado', $estado);
    $stmt -> bindValue(':id', $id);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//updateBookEstado
?>
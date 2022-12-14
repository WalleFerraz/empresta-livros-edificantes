<?php
require 'connection.php';

function insertLoan($idLivro, $idLeitor, $devolucao){
    $pdo = connection();
    $stmt = $pdo -> prepare('INSERT INTO emprestimo VALUES(DEFAULT, :livro, :leitor, NOW(), :devolucao)'); 
    $stmt -> bindValue(':livro', $idLivro);
    $stmt -> bindValue(':leitor', $idLeitor);
    $stmt -> bindValue(':devolucao', $devolucao);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//insertLoan
?>
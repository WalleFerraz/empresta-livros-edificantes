<?php
require 'connection.php';

function consultLoan(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT e.id, le.nomeLeitor, le.sobrenomeLeitor, le.numeroCelular, le.email, li.nomeLivro, e.dataEmprestimo, e.dataDevolucao FROM emprestimo e INNER JOIN livro li ON e.idLivro = li.id INNER JOIN leitor le ON e.idLeitor = le.id'); 
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultLoan

function consultLoanReader($leitor){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT e.id, le.nomeLeitor, le.sobrenomeLeitor, le.numeroCelular, le.email, li.nomeLivro, e.dataEmprestimo, e.dataDevolucao FROM emprestimo e INNER JOIN livro li ON e.idLivro = li.id INNER JOIN leitor le ON e.idLeitor = le.id WHERE le.nomeLeitor LIKE :leitor'); 
    $stmt -> bindValue(':leitor', $leitor.'%');
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultLoanReader
?>
<?php
require 'connection.php';

function updateReader($id, $nome, $sobrenome, $numero, $email){
    $pdo = connection();
    $stmt = $pdo -> prepare('UPDATE leitor SET nomeLeitor = :nome, sobrenomeLeitor = :sobrenome, numeroCelular = :numero, email = :email WHERE id = :id'); 
    $stmt -> bindValue(':nome', $nome);
    $stmt -> bindValue(':sobrenome', $sobrenome);
    $stmt -> bindValue(':numero', $numero);
    $stmt -> bindValue(':email', $email);
    $stmt -> bindValue(':id', $id);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//updateReader
?>
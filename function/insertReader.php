<?php
require 'connection.php';

function insertReader($nome, $sobrenome, $numero, $email){
    $pdo = connection();
    $stmt = $pdo -> prepare('INSERT INTO leitor VALUES(DEFAULT, :nome, :sobrenome, :numero, :email)'); 
    $stmt -> bindValue(':nome', $nome);
    $stmt -> bindValue(':sobrenome', $sobrenome);
    $stmt -> bindValue(':numero', $numero);
    $stmt -> bindValue(':email', $email);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//insertReader
?>
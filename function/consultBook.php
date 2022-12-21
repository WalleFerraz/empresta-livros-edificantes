<?php
require 'connection.php';

function consultBook(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro'); 
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultBook

function consultBookName($nome){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro WHERE nomeLivro LIKE :nome'); 
    $stmt -> bindValue(':nome', $nome.'%');
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultBookName

function consultBookEstado(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro WHERE estado = 1'); 
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultBookEstado

function consultBookEstadoName($livro){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro WHERE estado = 1 AND nomeLivro = :livro'); 
    $stmt -> bindValue(':livro', $livro);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultBookEstadoName
?>

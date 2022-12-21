<?php
require 'connection.php';

function consultBookOrderCres(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM livro ORDER BY nomeLivro'); 
    $stmt -> execute();
    return $stmt;
}//consultBookOrderCres

function consultReaderOrderCres(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT id, CONCAT(nomeLeitor, " ", sobrenomeLeitor) nomeCompleto FROM leitor ORDER BY nomeLeitor'); 
    $stmt -> execute(); 
    return $stmt;
}//consultReaderOrderCres

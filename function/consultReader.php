<?php
require 'connection.php';

function consultReader(){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM leitor'); 
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultReader

function consultReaderName($nome){
    $pdo = connection();
    $stmt = $pdo -> prepare('SELECT * FROM leitor WHERE nomeLeitor LIKE :nome'); 
    $stmt -> bindValue(':nome', $nome.'%');
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//consultReaderName
?>

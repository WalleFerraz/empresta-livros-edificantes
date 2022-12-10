<?php
require 'connection.php';

function deleteReader($id){
    $pdo = connection();
    $stmt = $pdo -> prepare('DELETE FROM leitor WHERE id = :id'); 
    $stmt -> bindValue(':id', $id);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//deleteReader
?>
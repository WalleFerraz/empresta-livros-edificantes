<?php
require 'connection.php';

function deleteBook($id){
    $pdo = connection();
    $stmt = $pdo -> prepare('DELETE FROM livro WHERE id = :id'); 
    $stmt -> bindValue(':id', $id);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}//deleteBook
?>
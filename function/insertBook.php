<?php
require 'connection.php';

function insertBook($nome, $autor, $descricao, $categoria, $paginas, $publico, $imagem)
{
    switch ($categoria) {
        case '1':
            $categoria = 'Meditação';
            break;
        case '2':
            $categoria = 'História';
            break;
        case '3':
            $categoria = 'Estudo';
            break;
        case '4':
            $categoria = 'Conhecimento da Igreja';
            break;
        case '5':
            $categoria = 'Biografia';
            break;
        default:
            $categoria = 'Nada';
            break;
    }

    switch ($publico) {
        case '1':
            $publico = 'Criança';
            break;
        case '2':
            $publico = 'Jovem';
            break;
        case '3':
            $publico = 'Adulto';
            break;
        case '4':
            $publico = 'Namorados';
            break;
        case '5':
            $publico = 'Casados';
            break;
        default:
            $publico = 'Nada';
            break;
    }
    
    $change = $imagem;
    $imagem = '../images/imagens-apontadas-pelo-banco/'.$change; 
   
    $pdo = connection();
    $stmt = $pdo->prepare('INSERT INTO livro VALUES(DEFAULT, :nome, :autor, :descricao, :categoria, :paginas, :publico, DEFAULT, :imagem)');
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':autor', $autor);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':categoria', $categoria);
    $stmt->bindValue(':paginas', $paginas);
    $stmt->bindValue(':publico', $publico);
    $stmt->bindValue(':imagem', $imagem);
    $stmt->execute();
    $pdo = null;
    return $stmt;
}//insertBook

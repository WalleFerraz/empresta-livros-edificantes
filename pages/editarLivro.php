<?php

session_start();

if (count($_GET) == 1) {
    $_SESSION['id'] = $_GET['codigo'];
    require_once '../function/consultBookId.php';
    $pst = consultBookId($_SESSION['id']);
    $vet = $pst->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['conteudo'] = $vet;
}


if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'Save') {
        //updateBook($id, $nome, $autor, $descricao, $categoria, $paginas, $publico, $estado, $imagem)
        require_once '../function/updateBook.php';
        updateBook(
            $_SESSION['id'],
            $_GET['cpTitle'],
            $_GET['cpAuthor'],
            $_GET['cpDescription'],
            $_GET['cpCategory'],
            $_GET['cpPages'],
            $_GET['cpPublic'],
            $_GET['cpEstado'],
            $_GET['cpWay']
        );
        header('Location: livro.php');
    }//if

    else if ($_GET['action'] == 'Delete'){
        require_once '../function/deleteBook.php';
        deleteBook($_SESSION['id']);
        header('Location: livro.php');
    }//else if
}

?>


<html>

<head>
    <meta charset="UTF-8">
    <title>Edição de livro</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/nsa-para-logo-removebg.png" type="image/png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</head>

<body>
    <nav>
        <div class="nav-wrapper">

            <a href="../pages/home.php">
                <img src="../images/logo-empresta-livro.png" alt="Logo do site empresta livro" class="logoSize">
            </a>

            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="home.php">Home</a></li>
                <li><a href="livro.php">Livros</a></li>
                <li><a href="leitor.php">Leitores</a></li>
                <li><a href="cadastroLeitor.php">Cadastrar Leitor</a></li>
                <li><a href="cadastroLivro.php">Cadastrar Livro</a></li>
                <li><a href="cadastroEmprestimo.php">Cadastrar Empréstimo</a></li>
            </ul>
        </div>
    </nav>

    <!-- Cadastro de livro -->
    <div class="center middle-box">
        <h4>
            Edição de livro
        </h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="cpTitle" value="<?= $_SESSION['conteudo'][0]['nomeLivro'] ?>" id="book_name" type="text" class="validate">
                        <label for="book_name">Título do livro</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="cpAuthor" value="<?= $_SESSION['conteudo'][0]['autor'] ?>" id="author_name" type="text" class="validate">
                        <label for="author_name">Autor(a) do livro</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5">
                        <select name="cpCategory">
                            <option value="" disabled selected>Categoria</option>
                            <option value="Meditação">Meditação</option>
                            <option value="História">História</option>
                            <option value="Estudo">Estudo</option>
                            <option value="Conhecimento da Igreja">Conhecimento da Igreja</option>
                            <option value="Biografia">Biografia</option>
                        </select>
                    </div>
                    <div class="input-field col s5">
                        <select name="cpPublic">
                            <option value="" disabled selected>Público indicado</option>
                            <option value="Criança">Criança</option>
                            <option value="Jovem">Jovem</option>
                            <option value="Adulto">Adulto</option>
                            <option value="Namorados">Namorados</option>
                            <option value="Casados">Casados</option>
                        </select>
                    </div>
                    <div class="input-field col s2">
                        <input name="cpPages" value="<?= $_SESSION['conteudo'][0]['numeroPaginas'] ?>" id="number_pages" type="number" class="validate">
                        <label for="number_pages">Páginas</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s8">
                        <input name="cpDescription" value="<?= $_SESSION['conteudo'][0]['descricaoLivro'] ?>" id="textarea" type="text" class="validate">
                        <label for="textarea">Descrição do livro...</label>
                    </div>
                    <div class="col s3">
                        <input name="cpWay" value="<?= $_SESSION['conteudo'][0]['imagem'] ?>" type="text">
                    </div>
                    <div class="input-field col s3">
                        <select name="cpEstado">
                            <option value="" disabled selected>Estado</option>
                            <option value="1">Disponível</option>
                            <option value="0">Indisponível</option>
                        </select>
                    </div>
                </div>


                <!-- Botões de excluir e salvar respectivamente -->
                <div class="row">
                    <div class="col s3 m3">
                        <button class="btn waves-effect waves-light red" type="submit" name="action" value="Delete">Excluir<i class="material-icons left">delete</i></button>
                    </div>
                    <button class="btn waves-effect waves-light red accent-2" type="submit" name="action" value="Save">Salvar</button>
                </div>
            </form>
        </div>
    </div>



    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                © 2022 Copyright Empresta Livro
            </div>
        </div>
    </footer>

    <script>
        M.AutoInit();
        $(document).ready(function() {
            $('select').formSelect()
        });
    </script>
</body>

</html>
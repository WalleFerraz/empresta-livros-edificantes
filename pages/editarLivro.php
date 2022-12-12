<?php
require_once '../function/consultBookId.php';    


session_start();
$_SESSION['id'] = $_GET['codigo'];

$pst = consultBookId($_SESSION['id']);
$vet = $pst->fetchAll(PDO::FETCH_ASSOC);

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
    }
}

?>


<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de um novo livro</title>

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
            </ul>
        </div>
    </nav>

    <!-- Cadastro de livro -->
    <div class="center middle-box">
        <h4>
            Cadastrar um novo livro
        </h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="cpTitle" id="book_name" type="text" class="validate">
                        <label for="book_name">Título do livro</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="cpAuthor" id="author_name" type="text" class="validate">
                        <label for="author_name">Autor(a) do livro</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5">
                        <select name="cpCategory">
                            <option value="" disabled selected>Categoria</option>
                            <option value="1">Meditação</option>
                            <option value="2">História</option>
                            <option value="3">Estudo</option>
                            <option value="4">Conhecimento da Igreja</option>
                            <option value="5">Biografia</option>
                        </select>
                    </div>
                    <div class="input-field col s5">
                        <select name="cpPublic">
                            <option value="" disabled selected>Público indicado</option>
                            <option value="1">Criança</option>
                            <option value="2">Jovem</option>
                            <option value="3">Adulto</option>
                            <option value="4">Namorados</option>
                            <option value="5">Casados</option>
                        </select>
                    </div>
                    <div class="input-field col s2">
                        <input name="cpPages" id="number_pages" type="number" class="validate">
                        <label for="number_pages">Páginas</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s8">
                        <textarea name="cpDescription" id="textarea" class="materialize-textarea"></textarea>
                        <label for="textarea">Descrição do livro...</label>
                    </div>
                    <div class="col s3">
                        <input name="cpWay" type="text">
                    </div>
                    <div class="col1">
                        <div class="switch">
                            <label>
                                Indisponível
                                <input name="cpEstado" type="checkbox">
                                <span class="lever"></span>
                                Disponível
                            </label>
                        </div>
                    </div>
                </div>


                <div class="row">
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
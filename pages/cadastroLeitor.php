<?php
require '../function/insertReader.php';

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'Save') {
        //insertReader($nome, $sobrenome, $numero, $email)
        insertReader(
            $_GET['cpName'],
            $_GET['cpLastName'],
            $_GET['cpPhone'],
            $_GET['cpEmail']
        );
    }
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de um novo leitor</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/nsa-para-logo-removebg.png" type="image/png">

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
                <li><a href="cadastroLeitor.php">Cadastrar leitor</a></li>
                <li><a href="cadastroLivro.php">Cadastrar livro</a></li>
                <li><a href="cadastroEmprestimo.php">Cadastrar Empréstimo</a></li>
            </ul>
        </div>
    </nav>

    <!-- Cadastro de leitor -->
    <div class="center middle-box">
        <h4>
            Cadastrar um novo leitor
        </h4>
        <div class="row">
            <form>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="cpName" id="first_name" type="text" class="validate">
                        <label for="first_name">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="cpLastName" id="last_name" type="text" class="validate">
                        <label for="last_name">Sobrenome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="cpEmail" id="email" type="email" class="validate">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="cpPhone" id="phone" type="tel" class="validate">
                        <label for="phone">Número de celular</label>
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
</body>

</html>
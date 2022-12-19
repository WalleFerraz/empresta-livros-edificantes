<?php
session_start();

if (count($_GET) == 1) {
    $_SESSION['id'] = $_GET['codigo'];
    require_once '../function/consultReaderId.php';
    $pst = consultReaderId($_SESSION['id']);
    $vet = $pst->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['conteudo'] = $vet;
}

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'Save') {
        //updateReader($id, $nome, $sobrenome, $numero, $email)
        require_once '../function/updateReader.php';
        updateReader(
            $_SESSION['id'],
            $_GET['cpName'],
            $_GET['cpLastName'],
            $_GET['cpPhone'],
            $_GET['cpEmail']
        );
        header('Location: leitor.php');
    } //if

    else if ($_GET['action'] == 'Delete') {
        require_once '../function/deleteReader.php';
        deleteReader($_SESSION['id']);
        header('Location: leitor.php');
    } //else if
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <title>Edição de leitor</title>

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
                <li><a href="cadastroLeitor.php">Cadastrar leitor</a></li>
                <li><a href="cadastroLivro.php">Cadastrar livro</a></li>
                <li><a href="cadastroEmprestimo.php">Cadastrar Empréstimo</a></li>
            </ul>
        </div>
    </nav>

    <!-- Cadastro de leitor -->
    <div class="center middle-box">
        <h4>
            Edição de leitor
        </h4>
        <div class="row">
            <form>
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?= $_SESSION['conteudo'][0]['nomeLeitor'] ?>" name="cpName" id="first_name" type="text" class="validate">
                        <label for="first_name">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input value="<?= $_SESSION['conteudo'][0]['sobrenomeLeitor'] ?>" name="cpLastName" id="last_name" type="text" class="validate">
                        <label for="last_name">Sobrenome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input value="<?= $_SESSION['conteudo'][0]['email'] ?>" name="cpEmail" id="email" type="email" class="validate">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-field col s6">
                        <input value="<?= $_SESSION['conteudo'][0]['numeroCelular'] ?>" name="cpPhone" id="phone" type="tel" class="validate">
                        <label for="phone">Número de celular</label>
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
</body>

</html>
<?php
require '../function/consultBookEstado.php';

$pst = consultBookEstado();
$vet = $pst->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Empresta Livros</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/nsa-para-logo-removebg.png" type="image/png">
    <link rel="import" href="../js/footer.js">

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


    <div class="row middle-box center">
        <div class="col s4 center">
            <!-- PHP -->
            <?php
            if (count($vet) >= 1) {
            ?>


                <h3><?= $vet[0]["quantidade"] ?></h3>


            <?php
            } //if
            else {
                echo '<h3>0</h3>';
            } //else
            ?>

            <a href="livrosDisponiveis.php">Livros disponíveis</a>
        </div>

        <div class="col s4 offset-s4 center">
            <!-- PHP -->
            <?php
            if (count($vet) == 2) {
            ?>


                <h3><?= $vet[1]["quantidade"] ?></h3>


            <?php
            } //if
            else {
                echo '<h3>0</h3>';
            } //else
            ?>
            <a  href="livrosIndisponiveis.php">Livros indisponíveis</a>

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
<?php
require '../function/consultBookName.php';

//$pst = fullSearch();
//$rs = $pst -> fetchAll(PDO::FETCH_ASSOC);

if (!empty($_GET)) {
    if ($_GET['action'] == 'Search') {
        $pst = consultBookName($_GET['cpSearch']);
        $vet = $pst->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>



<html>

<head>
    <meta charset="UTF-8">
    <title>Livros</title>

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
            <!-- header -->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="home.php">Home</a></li>
                <li><a href="livro.php">Livros</a></li>
                <li><a href="leitor.php">Leitores</a></li>
                <li><a href="cadastroLeitor.php">Cadastrar Leitor</a></li>
                <li><a href="cadastroLivro.php">Cadastrar Livro</a></li>
            </ul>
        </div>
    </nav>


    <!-- Campo de busca -->
    <div class="center middle-box">
        <form>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons small right">search</i>
                    <input name="cpSearch" id="title" type="text" class="validate">
                    <label for="title">Pesquisar livro</label>
                </div>
            </div>
            <!-- Botão de buscar -->
            <div class="row">
                <button class="btn waves-effect waves-light red accent-2" type="submit" name="action" value="Search">Buscar</button>
            </div>
        </form>
    </div>


    <div class="row">
        <?php
        if (!empty($_GET)) {
            foreach ($vet as $card) {
                if ($card['estado'] == 'D') {
                    $estado = 'Diponível';
                } //if
                else {
                    $estado = 'Indisponível';
                } //else
        ?>

                <div class="col s2">
                    <div class="card">
                        <div class="card-image">
                            <img src="../images/imagens-apontadas-pelo-banco/imagem1.jpg"></img>
                            <!-- Dropdown Trigger -->
                            <a class='drop  down-trigger btn red darken-1' href='#' data-target='dropdown1'>Edição</a>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="#!"><i class="material-icons right red35">create</i></a></li>
                                <li><a href="#!"><i class="material-icons right red35">delete</i></a></li>
                                <li><a href="#!"><i class="material-icons right red35">remove_red_eye</i></a></li>
                            </ul>
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?= $card['nomeLivro'] ?></span>

                            <?php
                            if ($card['estado'] == 'D') {
                            ?>

                                <p class="green lighten-1"><?= $estado ?></p>

                            <?php
                            } //if
                            else {
                            ?>

                                <p class="red lighten-1"><?= $estado ?></p>

                            <?php
                            } //else
                            ?>
                            <p><?= $card['autor'] ?>, <?= $card['categoria'] ?>, <?= $card['publicoIndicado'] ?>, <?= $card['numeroPaginas'] ?> páginas</p>
                        </div>
                    </div>
                </div>

        <?php
            } //foreach
        } //if

        ?>
    </div>


    <!-- footer -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                © 2022 Copyright Empresta Livro
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var drop = document.querySelectorAll('.dropdown-trigger');
            M.Dropdown.init(drop, {
                coverTrigger: false,
                constrainWidth: false
            });
        });
    </script>

</body>

</html>
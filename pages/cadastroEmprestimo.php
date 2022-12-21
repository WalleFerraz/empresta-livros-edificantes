<?php

if (!empty($_GET)) {
    require '../function/insertLoan.php';
    //insertLoan($idLivro, $idLeitor, $devolucao)
    insertLoan(
        $_GET['cpLivro'],
        $_GET['cpLeitor'],
        $_GET['cpDevolucao']
    );

    //updateBookEstado($id, $estado)
    updateBookEstado($_GET['cpLivro'], '0');
    header('Location:cadastroEmprestimo.php');
} //if

else {
    require '../function/consultBROrderCres.php';
    $pst1 = consultBookOrderCres();
    $pst2 = consultReaderOrderCres();
    $vet1 = $pst1->fetchAll(PDO::FETCH_ASSOC);
    $vet2 = $pst2->fetchAll(PDO::FETCH_ASSOC);
} //else

?>


<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de um novo empréstimo</title>

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

    <!-- Cadastro de empréstimo -->
    <div class="center middle-box">
        <h4>
            Cadastrar um novo empréstimo
        </h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <select name="cpLeitor">
                            <option value="" disabled selected>Leitor</option>


                            <!-- PHP -->
                            <?php
                            foreach ($vet2 as $line2) {
                            ?>

                                <option value="<?= $line2['id'] ?>"><?= $line2['nomeCompleto'] ?></option>

                                <!-- PHP -->
                            <?php
                            } //foreach
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <select name="cpLivro">
                            <option value="" disabled selected>Livro</option>


                            <!-- PHP -->
                            <?php
                            foreach ($vet1 as $line1) {
                            ?>
                                <option value="<?= $line1['id'] ?>"><?= $line1['nomeLivro'] ?></option>

                            <?php
                            } //foreach
                            ?>


                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5">
                        <input id="devolucao" name="cpDevolucao" type="date">
                        <label for="devolucao">Data de devolução</label>
                    </div>


                    <div class="row">
                        <button class="btn waves-effect waves-light red accent-2" type="submit" name="action" value="Save">Emprestar</button>
                    </div>
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
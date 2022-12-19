<?php

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'Save') {
        require '../function/insertLoan.php';
        //insertLoan($idLivro, $idLeitor, $devolucao)
        insertLoan(
            $_GET['cpLeitor'],
            $_GET['cpLivro'],
            $_GET['cpDevolucao']
        );
    }
} //else
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
                        <button class="btn waves-effect waves-light red accent-2" type="submit" name="action" value="Save">Salvar</button>
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


        /*.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, options);
        });*/

        //Date Picker
        var diaSemana = ['Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado'];
        var mesAno = ['Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        var data = new Date();
        var hoje = diaSemana[data.getDay()] + ', ' + mesAno[data.getMonth()] + ' de ' + data.getFullYear();

        $("#dataPesquisa").attr("value", hoje);
        $(".datepicker").pickadate({
            monthsFull: mesAno,
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdaysFull: diaSemana,
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            selectMonths: true,
            selectYears: true,
            clear: true,
            format: 'yyyy/mm/dd',
            today: "Hoje",
            close: "Limpar",
            min: new Date(data.getFullYear() - 1, 0, 1),
            max: new Date(data.getFullYear() + 1, 11, 31),
            closeOnSelect: true
        });

        $("#dataPesquisa").click(function(event) {
            event.stopPropagation();
            $(".datepicker").first().pickadate("picker").open();
        });
    </script>
</body>

</html>
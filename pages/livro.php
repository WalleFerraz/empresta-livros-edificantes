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
                <li><a href="#">Livros</a></li>
                <li><a href="#">Leitores</a></li>
                <li><a href="cadastroLeitor.php">Cadastrar Leitor</a></li>
                <li><a href="cadastroLivro.php">Cadastrar Livro</a></li>
            </ul>
        </div>
    </nav>


    <div>
        <div class="row">
            <div class="col s2">
                <div class="card">
                    <div class="card-image">
                        <img src="../images/livro-suma-teologica.jpg">
                        <!-- Dropdown Trigger -->
                        <a class='dropdown-trigger btn red darken-1' href='#' data-target='dropdown1'>Edição</a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="#!"><i class="material-icons right red35">create</i></a></li>
                            <li><a href="#!"><i class="material-icons right red35">delete</i></a></li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <span class="card-title">Suma Teológica</span>
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>
        </div>
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
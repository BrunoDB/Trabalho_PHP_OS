<?php
//    session_start();
//    
//    if(!$_SESSION['logado'])
//        header('Location: login.php');
//    
//    require_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Ordem de serviço - BDB</title>
        <!-- Bootstrap core CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="navbar.css" rel="stylesheet">
        <style>
            .dropbtnN {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            .dropbtnN:hover, .dropbtnN:focus {
                background-color: #3e8e41;
            }

            .dropdownN {
                position: relative;
                display: inline-block;
            }

            .dropdownN-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                overflow: auto;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }

            .dropdownN-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdownN a:hover {background-color: #f1f1f1}

            .show {display:block;}
        </style>
    </head>

    <body>

        <div class="container">

            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">BDB -  SUPORTE</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Abrir Ordem</a></li>
                            <li><a href="#">Fechar Ordem</a></li>
                            <li><a href="#">Ordens Abertas</a></li>
                            <li><a href="#">Ordens Fechadas</a></li>
                            <!--<li><a href="index.php?manutencao=curso">Curso</a></li>-->
                            <div class="dropdownN">
                                <button onclick="myFunction()" class="dropbtnN">Manutenções</button>
                                <div id="myDropdownN" class="dropdownN-content">
                                    <a href="index.php?manutencao=usuario&acao=novo">Cadastrar Usuario</a>
                                    <a href="#about">Cadastrar Cidade</a>
                                    <a href="#contact">Cadastrar Cliente</a>
                                    <a href="#contact">Ver Clientes Cadastrados</a>
                                    <a href="#contact">Ver Cidades Cadastrados</a>
                                    <a href="index.php?manutencao=usuario">Ver Usuario Cadastrados</a>
                                </div>
                            </div>
                            <!--                            <li class="dropdown">
                                                            <a  class="dropdown-toggle" data-toggle="dropdown" role="button" 
                                                                aria-haspopup="true" >Manutenções <span class="caret"></span></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="index.php?manutencao=aluno">Aluno</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li role="separator" class="divider"></li>
                                                                <li class="dropdown-header">Nav header</li>
                                                                <li><a href="#">Separated link</a></li>
                                                                <li><a href="#">One more separated link</a></li>
                                                            </ul>
                                                        </li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="valida.php?acao=sair">
                                    <i class="glyphicon glyphicon-off"></i> Sair 
                                </a>
                            </li>

                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>

            <?php
            if (isset($_GET['manutencao'])) {
                $arq = 'crud_' . $_GET['manutencao'] . '.php';

                if (file_exists($arq)) {
                    require $arq;
                } else {
                    echo "Manutenção não localizada";
                }
            } else {
                ?>
                <!-- Main component for a primary marketing message or call to action -->
                <div class="jumbotron">
                    <h1>Primeira Aplicação</h1>
                    <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
                    </p>
                </div>
            <?php } ?>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
                                    /* When the user clicks on the button, 
                                     toggle between hiding and showing the dropdown content */
                                    function myFunction() {
                                        document.getElementById("myDropdownN").classList.toggle("show");
                                    }

                                    // Close the dropdown if the user clicks outside of it
                                    window.onclick = function (event) {
                                        if (!event.target.matches('.dropbtnN')) {

                                            var dropdowns = document.getElementsByClassName("dropdownN-content");
                                            var i;
                                            for (i = 0; i < dropdowns.length; i++) {
                                                var openDropdownN = dropdowns[i];
                                                if (openDropdownN.classList.contains('show')) {
                                                    openDropdownN.classList.remove('show');
                                                }
                                            }
                                        }
                                    }
        </script>
    </body>
</html>

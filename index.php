<?php
session_start();
ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');
require_once './conexao.php';
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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
                            <li class="active"><a href="index.php?manutencao=os&acao=novo">Abrir Ordem</a></li>
                            <li><a href="index.php?manutencao=Os&acao=listara">Ordens Abertas</a></li>
                            <li><a href="index.php?manutencao=Os&acao=listarF">Ordens Fechadas</a></li>
                            <li><a href="index.php?manutencao=Os">Todas as Ordens</a></li>
                            <div class="dropdownN">
                                <button onclick="myFunction()" class="dropbtnN">Manutenções</button>
                                <div id="myDropdownN" class="dropdownN-content">
                                    <a href="index.php?manutencao=usuario&acao=novo">Cadastrar Usuario</a>
                                    <a href="index.php?manutencao=cidade&acao=novo">Cadastrar Cidade</a>
                                    <a href="index.php?manutencao=cliente&acao=novo">Cadastrar Cliente</a>
                                    <a href="index.php?manutencao=cliente">Ver Clientes Cadastrados</a>
                                    <a href="index.php?manutencao=cidade">Ver Cidades Cadastrados</a>
                                    <a href="index.php?manutencao=usuario">Ver Usuario Cadastrados</a>
                                    <a href="pdf.php">Gerar um pdf com todas as ordens</a>
                                </div>
                            </div>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a>Olá <?php echo $_SESSION['logado']; ?></a></li>
                            <li><a href="../navbar-fixed-top/"></a></li>
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
                <div class="jumbotron">
                    <h1>Suporte - BDB</h1>
                    <p>Criação de Ordens de serviço para suporte.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="index.php?manutencao=os&acao=novo" role="button">Abrir de ordem de serviço&raquo;</a>
                    </p>
                </div>
            <?php } ?>
        </div> <!-- /container -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
                                    function myFunction() {
                                        document.getElementById("myDropdownN").classList.toggle("show");
                                    }
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
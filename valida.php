<?php

session_start();

//desconectando da aplicação
if (isset($_GET['acao']) && $_GET['acao'] == "sair") {
    unset($_SESSION['logado']);
    header('Location: login.php');
}
require_once './conexao.php';
$sql = "SELECT * FROM usuario WHERE email=:email "
        . " AND senha = :senha";
$query = $bd->prepare($sql);
$r = $query->execute(array('email' => $_POST['email'],
    'senha' => md5($_POST['senha'])));
if ($r) {
    if ($query->rowCount() == 1) {
        $_SESSION['logado'] = $_POST['email'];
        header('Location: index.php');
    } else {
        $erro = "Usuário ou senha inválidos";
        require './login.php';
    }
}

 
 


 


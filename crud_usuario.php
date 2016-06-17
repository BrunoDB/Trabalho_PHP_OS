<?php

require_once './conexao.php';
if (!isset($_GET['acao']))
    $acao = "listar";
else
    $acao = $_GET['acao'];
//Listar Usuarios
if ($acao == "listar") {
    $select = "SELECT * FROM usuario";
    $query = $bd->query($select);
    $lista = $query->fetchAll();
    require './listar_Usuario.php';
}
//Excluir Usuario selecionado
else if ($acao == "excluir") {
    $select = "DELETE FROM usuario WHERE id = :id";
    $query = $bd->prepare($select);
    if ($query->execute(array('id' => $_GET['id'])))
        header('Location: index.php?manutencao=usuario');
    else
        print_r($query->errorInfo());
}
//Adicionar Novo Usuario
else if ($acao == "novo") {
    $action = "index.php?manutencao=usuario&acao=cadastrar";

    require './form_Usuario.php';
}
//Cadastrar Novo Usuario
else if ($acao == "cadastrar") {
    $select = "INSERT INTO usuario(usuario,email, senha) VALUES(:usuario,:email, :senha)";
    $query = $bd->prepare($select);
    if ($query->execute(array('usuario' => $_POST['usuario'], 'email' => $_POST['email'], 'senha' => md5($_POST['senha']))))
        header('Location: index.php?manutencao=usuario');
    else
        echo 'Erro ao cadastrar';
    print_r($query->errorInfo());
}
//Atualizar Usuario
else if ($acao == "atualizar") {
    $select = "UPDATE usuario set usuario = :usuario, email = :email,  senha = :senha WHERE id = :id";
    $query = $bd->prepare($select);
    $_POST['id'] = $_GET['id'];
    if ($query->execute(array('id' => $_POST['id'], 'usuario' => $_POST['usuario'], 'email' => $_POST['email'], 'senha' => md5($_POST['senha']))))
        header('Location: index.php?manutencao=usuario');
    else
        print_r($query->errorInfo());
}
//Buscar usuario
else if ($acao == "buscar") {
    $select = "SELECT * FROM usuario WHERE id = :id";
    $query = $bd->prepare($select);
    $query->execute(array('id' => $_GET['id']));
    $registro = $query->fetch();
    $action = "index.php?manutencao=usuario&acao=atualizar&id=" . $_GET['id'];
    require './form_Usuario.php';
}
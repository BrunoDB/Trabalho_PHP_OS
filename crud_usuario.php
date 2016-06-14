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
    $select = "DELETE FROM usuario WHERE idusuario = :id";
    $query = $bd->prepare($select);
    if ($query->execute(array('id' => $_GET['id'])))
        header('Location: index.php?manutencao=usuario');
    else
        print_r($query->errorInfo());
}
//Criar novo usuario
else if ($acao == "novo") {
    $action = "index.php?manutencao=usuario&acao=cadastrar";
    $listaTipo = BuscaTipo();
    $listaCidade = BuscaCidade();
    require './form_Usuario.php';
} else if ($acao == "cadastrar") {
    $select = "INSERT INTO usuario(usuario, email, senha, idtipo ,idcidade) "
            . "VALUES(:usuario,:email, :idtipo, :idcidade, :senha)";
    $query = $bd->prepare($select);
    if ($query->execute(array('usuario' => $_POST['usuario'],
                'idtipo' => $_POST['idtipo'],
                'idcidade' => $_POST['idcidade'] ,
                'email' => $_POST['email'],
                'senha' => md5($_POST['senha']))))
        header('Location: index.php?manutencao=usuario');
    
    else
        echo 'Falha ao Cadastrare Usuário<br>';
        print_r($query->errorInfo());
}
//Atualizar Usuario
else if ($acao == "atualizar") {
    $select = "UPDATE usuario set nome = :nome, email = :email,  senha = :senha WHERE idUsuario = :id";
    $query = $bd->prepare($select);
    $_POST['id'] = $_GET['id'];
    if ($query->execute(array('id' => $_POST['id'], 'nome' => $_POST['nome'], 'email' => $_POST['email'], 'senha' => md5($_POST['senha']))))
        header('Location: index.php?manutencao=usuario');
    else
        print_r($query->errorInfo());
}
//Buscar usuario
else if ($acao == "buscar") {
    $select = "SELECT * FROM usuario WHERE idusuario = :id";
    $query = $bd->prepare($select);
    $query->execute(array('id' => $_GET['id']));
    $registro = $query->fetch();
    $action = "index.php?manutencao=usuario&acao=atualizar&id=" . $_GET['id'];
    require './formUsuario.php';
}

function BuscaTipo() {
    $bd = $GLOBALS['bd'];
    $select = "SELECT * FROM tipo";
    $queryT = $bd->query($select);
    return $queryT->fetchAll();
}

function BuscaCidade() {
    $bd = $GLOBALS['bd'];
    $select = "SELECT * FROM cidade";
    $queryC = $bd->query($select);
    return $queryC->fetchAll();
}

<?php

require_once './conexao.php';
if (!isset($_GET['acao']))
    $acao = "listar";
else
    $acao = $_GET['acao'];
//Listar OS
if ($acao == "listar") {
    $select = "select o.id, nome, usuario, o.data_abertura, o.data_termino, o.descricao_problema, o.descricao_solucao, o.status
            from ordem o 
	inner join usuario u on o.idusuario = u.id 
	inner join cliente c on o.idcliente = c.id";
    $query = $bd->query($select);
    $lista = $query->fetchAll();
    echo '<center><h1>Lista de todas as OS</h1></center>';
    require './listar_Os.php';
}
//Listar OS
if ($acao == "listarF") {
    $select = "select o.id, nome, usuario, o.data_abertura, o.data_termino, o.descricao_problema, o.descricao_solucao, o.status
from ordem o 
	inner join usuario u on o.idusuario = u.id 
	inner join cliente c on o.idcliente = c.id
where status = FALSE";
    $query = $bd->query($select);
    $lista = $query->fetchAll();
    echo '<center><h1>Ordens Fechadas</h1></center>';
    require './listar_Os.php';
}
if ($acao == "listara") {
    $select = "select o.id, nome, usuario, o.data_abertura, o.data_termino, o.descricao_problema, o.descricao_solucao, o.status
from ordem o 
	inner join usuario u on o.idusuario = u.id 
	inner join cliente c on o.idcliente = c.id
where status = TRUE";
    $query = $bd->query($select);
    $lista = $query->fetchAll();
    echo '<center><h1>Ordens Abertas</h1></center>';
    require './listar_Os.php';
}
//Excluir Usuario selecionado
else if ($acao == "excluir") {
    $select = "DELETE FROM ordem WHERE id = :id";
    $query = $bd->prepare($select);
    if ($query->execute(array('id' => $_GET['id'])))
        header('Location: index.php?manutencao=os');
    else
        print_r($query->errorInfo());
}
//Adicionar Nova OS
else if ($acao == "novo") {
    $action = "index.php?manutencao=os&acao=cadastrar";
    $listaCliente = BuscaCliente();
    $listaUsuario = BuscaUsuario();
    require './form_Os.php';
}
//Abrir nova Ordem
else if ($acao == "cadastrar") {
    $insert = "insert into ordem(idcliente, idusuario, data_abertura, descricao_problema,descricao_solucao,status) "
            . "values(:idcliente, :idusuario, :data_abertura, :descricao_problema, :descricao_solucao, :status)";
    $query = $bd->prepare($insert);
    if ($query->execute($_POST))
        header('Location: index.php?manutencao=os');
    else
        echo 'Erro 01<br>';
    print_r($query->errorInfo());
}
//Atualizar os
else if ($acao == "atualizar") {
    $select = "UPDATE ordem set idcliente = :idcliente, idusuario = :idusuario, data_abertura = :data_abertura,data_termino = :data_termino, descricao_problema = :descricao_problema,descricao_solucao = :descricao_solucao,status = :status WHERE id = :id";
    $query = $bd->prepare($select);
    $_POST['id'] = $_GET['id'];
    if ($query->execute($_POST))
        header('Location: index.php?manutencao=os');
    else
        print_r($query->errorInfo());
}
//Buscar usuario
else if ($acao == "buscar") {
    $select = "SELECT * FROM ordem WHERE id = :id";
    $query = $bd->prepare($select);
    $query->execute(array('id' => $_GET['id']));
    $registro = $query->fetch();
    $action = "index.php?manutencao=os&acao=atualizar&id=" . $_GET['id'];
    require './form_OsUp.php';
}

function BuscaCliente() {
    $bd = $GLOBALS['bd'];
    $select = "SELECT * FROM cliente";
    $queryT = $bd->query($select);
    return $queryT->fetchAll();
}

function BuscaUsuario() {
    $bd = $GLOBALS['bd'];
    $select = "SELECT * FROM usuario";
    $queryC = $bd->query($select);
    return $queryC->fetchAll();
}

<?php

if (!isset($_GET['acao']))
    $acao = "listar";
else
    $acao = $_GET['acao'];
if ($acao == "listar") {
    $sql = "select c.id, nome, cidade, telefone
from cliente c inner join cidade ci on c.idcidade = ci.id ";
    $query = $bd->query($sql);
    $lista = $query->fetchAll();
    require './lista_Cliente.php';
}
//-----Ação de excluir
else if ($acao == "excluir") {
    $sql = "DELETE FROM cliente WHERE id = :id";
    $query = $bd->prepare($sql);
    if ($query->execute(array('id' => $_GET['id'])))
        header('Location: index.php?manutencao=cliente');
    else
        print_r($query->errorInfo());
}
//--------Ação Novo
else if ($acao == "novo") {
    $action = "index.php?manutencao=cliente&acao=cadastrar";
    $listaCidade = BuscaCidade();
    require './form_Cliente.php';
}
//--------Ação Cadastrar
else if ($acao == "cadastrar") {
    $sql = "INSERT INTO cliente(nome, idcidade, telefone) "
            . " VALUES(:nome, :idcidade, :telefone)";
    $query = $bd->prepare($sql);
    if ($query->execute($_POST))
        header('Location: index.php?manutencao=cliente');
    else
        print_r($query->errorInfo());
}
//--------Ação Atualizar
else if ($acao == "atualizar") {
    $sql = "UPDATE cliente set nome = :nome, idcidade = :idcidade,"
            . " telefone = :telefone WHERE id = :id";
    $query = $bd->prepare($sql);
    $_POST['id'] = $_GET['id'];

    if ($query->execute($_POST))
        header('Location: index.php?manutencao=cliente');
    else
        print_r($query->errorInfo());
}
//Ação Buscar
else if ($acao == "buscar") {
    $sql = "SELECT * FROM cliente WHERE id = :id";
    $query = $bd->prepare($sql);
    $query->execute(array('id' => $_GET['id']));
    $registro = $query->fetch();
    $action = "index.php?manutencao=cliente&acao=atualizar&id=" . $_GET['id'];
    $listaCurso = BuscaCursos();
    require './form_Cliente.php';
}

function BuscaCidade() {
    $bd = $GLOBALS['bd'];
    $select = "SELECT * FROM cidade";
    $queryT = $bd->query($select);
    return $queryT->fetchAll();
}

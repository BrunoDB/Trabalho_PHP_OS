<?php

ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');
require_once './conexao.php';

if (!isset($_GET['acao']))
    $acao = "listar";
else
    $acao = $_GET['acao'];
if ($acao == "listar") {
    $sql = "SELECT * FROM cidade";
    $query = $bd->query($sql);
    $lista = $query->fetchAll();
    require './lista_Cidade.php';
}
//-----Ação de excluir
else if ($acao == "excluir") {
    $sql = "DELETE FROM cidade WHERE id = :id";
    $query = $bd->prepare($sql);
    if ($query->execute(array('id' => $_GET['id'])))
        header('Location: index.php?manutencao=cidade');
    else
        echo '<center><h1>Erro 0x000FHSDJ23:</h1><br> Esta Cidade esta vinculado a um Usuário e não pode ser excluido.<br>Tambem te amo:)</center>  ';
//        print_r($query->errorInfo());
}
//--------Ação Novo
else if ($acao == "novo") {
    $action = "index.php?manutencao=cidade&acao=cadastrar";
    require './form_Cidade.php';
}
//--------Ação Cadastrar
else if ($acao == "cadastrar") {
    $sql = "INSERT INTO cidade(cidade) VALUES(:cidade)";
    $query = $bd->prepare($sql);
    if ($query->execute($_POST))
        header('Location: index.php?manutencao=cidade');
    else
          echo '<center><h1>Erro 0x000FHSDJ27:</h1><br> Erro ao cadastrar Cidade. <br>Entre em contato com o administrador.<br><br>Tambem te amo:)</center>  ';
//        print_r($query->errorInfo());
}
//--------Ação Atualizar
else if ($acao == "atualizar") {
    $sql = "UPDATE curso set cidade = :cidade WHERE id = :id";
    $query = $bd->prepare($sql);
    //ajustando o id que vem por GET, jogando para o ARRAY POST
    $_POST['id'] = $_GET['id'];

    if ($query->execute($_POST))
        header('Location: index.php?manutencao=cidade');
    else
        echo '<center><h1>Erro 0x000FHSDJ28:</h1><br> Erro ao adicionar novas informações. <br>Entre em contato com o administrador.<br><br>Tambem te amo:)</center>  ';
//        print_r($query->errorInfo());
}
//Ação Buscar
else if ($acao == "buscar") {
    $sql = "SELECT * FROM cidade WHERE id = :id";
    $query = $bd->prepare($sql);
    $query->execute(array('id' => $_GET['id']));
    $registro = $query->fetch();
    //incluindo o form para mostrar os dados
    $action = "index.php?manutencao=cidade&acao=atualizar&id=" . $_GET['id'];
    require './form_Cidade.php';
}
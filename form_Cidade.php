<?php
ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');
require_once './conexao.php';

if(!isset($action)) 
        $action = "index.php?manutencao=cidade&acao=cadastrar";
?>
<form name="formCurso" action="<?php echo $action; ?>" method="POST">
    <div class="form-group">
        <label for="cidade">Cidade</label>
        <input class="form-control" type="text" name="cidade" value="<?php if(isset($registro)) echo $registro['cidade']; ?>">
    <input type="submit" value="Enviar">
</form>

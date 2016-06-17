<?php
if (!isset($action))
    $action = "index.php?manutencao=usuario&acao=cadastrar";
?>
<form name="formUsuario" action="<?php echo $action; ?>" method="POST">
    <div class="form-group">
        <label for="usuario">Nome</label>
        <input class="form-control" type="text" name="usuario" value="<?php if (isset($registro)) echo $registro['usuario']; ?>">
    </div>   
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" value="<?php if (isset($registro)) echo $registro['email']; ?>">
    </div>    
    <div class="form-group">
        <label for="senha">Senha</label>
        <input class="form-control" type="password" name="senha" value="">
    </div>
    <input type="submit" value="Enviar">
</form>
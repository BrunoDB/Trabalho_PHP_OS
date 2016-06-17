<?php
if (!isset($action))
    $action = "index.php?manutencao=os&acao=cadastrar";
?>
<form name="form_OsUp" action="<?php echo $action; ?>" method="POST">
    <div class="form-group">
        <label for="idcliente">Cliente</label>
 <input class="form-control" type="text" name="idcliente" value="<?php if (isset($registro)) echo $registro['idcliente']; ?>">
    </div>
    <div class="form-group">
        <label for="idusuario">Usuario(Atendente)</label>
                <input class="form-control" type="text" name="idusuario" value="<?php if (isset($registro)) echo $registro['idusuario']; ?>">
    </div>
    <div class="form-group">
        <label for="data_abertura">Data de Abertura</label>
        <input class="form-control" type="date" name="data_abertura" value="<?php if (isset($registro)) echo $registro['data_abertura']; ?>">
    </div>   
   <div class="form-group">
        <label for="data_termino">Data de Termino</label>
        <input class="form-control" type="date" name="data_termino" value="<?php if (isset($registro)) echo $registro['data_termino']; ?>">
    </div> 
    <div class="form-group">
        <label for="descricao_problema">Descricao do Problema</label>
        <input class="form-control" type="text" name="descricao_problema" value="<?php if (isset($registro)) echo $registro['descricao_problema']; ?>">
    </div>    
    <div class="form-group">
        <label for="descricao_solucao">Descricao da Solução</label>
        <input class="form-control" type="text" name="descricao_solucao" value="<?php if (isset($registro)) echo $registro['descricao_solucao']; ?>">
    </div>    
        <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option value="t" <?php if(isset($registro) && $registro['status']===true) echo "selected"; ?>>Aberto</option>
            <option value="f" <?php if(isset($registro) && $registro['status']===false) echo "selected"; ?>>Fechado</option>
        </select>
    </div>
    <input type="submit" value="Enviar">
</form>
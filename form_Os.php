<?php
if (!isset($action))
    $action = "index.php?manutencao=os&acao=cadastrar";
?>
<form name="form_Os" action="<?php echo $action; ?>" method="POST">
    <div class="form-group">
        <label for="idcliente">Cliente</label>
        <select class="form-control" name="idcliente">
            <?php foreach ($listaCliente as $cliente) { ?>
                <option value="<?php echo $cliente['id']; ?>"
                <?php
                if (isset($cliente) && $cliente['id'] == $cliente['id'])
                    echo "selected";
                ?>>
                            <?php echo $cliente['nome']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="idusuario">Usuario(Atendente)</label>
        <select class="form-control" name="idusuario">
            <?php foreach ($listaUsuario as $usuario) { ?>
                <option value="<?php echo $usuario['id']; ?>"
                <?php
                if (isset($usuario) && $usuario['id'] == $usuario['id'])
                    echo "selected";
                ?>>
                            <?php echo $usuario['usuario']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="data_abertura">Data de Abertura</label>
        <input class="form-control" type="date" name="data_abertura" value="<?php if (isset($registro)) echo $registro['data_abertura']; ?>">
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
            <option value="t" <?php if (isset($registro) && $registro['status'] === true) echo "selected"; ?>>Aberto</option>
            <option value="f" <?php if (isset($registro) && $registro['status'] === false) echo "selected"; ?>>Fechado</option>
        </select>
    </div>
    <input type="submit" value="Enviar">
</form>
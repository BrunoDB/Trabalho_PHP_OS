<?php
if (!isset($action))
    $action = "index.php?manutencao=usuario&acao=cadastrar";
//
//require_once './conexao.php';
//
//
//$selectEspecie = "SELECT * FROM especie";
//$query = $bd->query($selectEspecie);
//$listaEspecie = $query->fetchAll();
?>

<form name="form_Usuario" action="<?php echo $action; ?>" method="POST">
    <div class="form-group">
        <label for="usuario">Nome</label>
        <input class="form-control" type="text" name="usuario" value="<?php if (isset($registro)) echo $registro['usuario']; ?>">
    </div>    
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" value="<?php if (isset($registro)) echo $registro['email']; ?>">
    </div>    
     <div class="form-group">
        <label for="tipo">Tipo</label>
        <select class="form-control" name="idtipo">
            <?php foreach ($listaTipo as $tipo) { ?>
            <option value="<?php echo $tipo['idtipo']; ?>"
                    <?php if(isset($registro) 
                            && $registro['idtipo'] == $tipo['idtipo'])
                        echo "selected"; ?>>
                <?php echo $tipo['tipo']; ?>
            </option>
            <?php } ?>
        </select>
    </div>
     <div class="form-group">
        <label for="cidade">Cidade</label>
        <select class="form-control" name="idcidade">
            <?php foreach ($listaCidade as $cidade) { ?>
            <option value="<?php echo $cidade['idcidade']; ?>"
                    <?php if(isset($registro) 
                            && $registro['idcidade'] == $cidade['idcidade'])
                        echo "selected"; ?>>
                <?php echo $cidade['cidade']; ?>
            </option>
            <?php } ?>
        </select>
    </div>   
    <div class="form-group">
        <label for="senha">Senha</label>
        <input class="form-control" type="password" name="senha" value="">
    </div>
    <input type="submit" value="Enviar">
</form>

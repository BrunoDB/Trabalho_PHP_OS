<?php
ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');
require_once './conexao.php';

if (!isset($action))
    $action = "index.php?manutencao=cliente&acao=cadastrar";
?>
<form name="form_cliente" action="<?php echo $action; ?>" method="POST">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" type="text" name="nome" value="<?php if (isset($registro)) echo $registro['nome']; ?>">
    </div>
    <div class="form-group">
        <label for="idcidade">Cidade</label>
        <select class="form-control" name="idcidade">
            <?php foreach ($listaCidade as $cidade) { ?>
                <option value="<?php echo $cidade['id']; ?>"
                <?php
                if (isset($cidade) && $cidade['id'] == $cidade['id'])
                    echo "selected";
                ?>>
                            <?php echo $cidade['cidade']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input class="form-control" type="text" name="telefone" value="<?php if (isset($registro)) echo $registro['telefone']; ?>">
    </div>
    <input type="submit" value="Enviar">
</form>

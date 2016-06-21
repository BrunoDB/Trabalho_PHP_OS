<?php
ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');
require_once './conexao.php';
?>
<!--<a href="index.php?manutencao=cliente&acao=novo">
    <span class="glyphicon glyphicon-plus">Adicionar</span> 
</a>-->
<table class="table table-striped table-hover">
    <thead>
    <th>#</th>
    <th>Nome</th>
    <th>Cidade</th>
    <th>Telefone</th>
    <th>Editar</th>
    <th>Excluir</th>
</thead>
<tbody>
    <?php foreach ($lista as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['cidade']; ?></td>
            <td><?php echo $item['telefone']; ?></td>
            <td>
                <a href="index.php?manutencao=cliente&acao=buscar&id=<?php echo $item['id']; ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
            <td>
                <a href="index.php?manutencao=cliente&acao=excluir&id=<?php echo $item['id']; ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
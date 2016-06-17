<?php
ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');

require_once './conexao.php';
?>
<a href="index.php?manutencao=os&acao=novo">
    <span class="glyphicon glyphicon-plus">Adicionar Usuário</span> 
</a>
<table class="table table-striped table-hover">
    <thead>
    <th>#</th>
    <th>Cliente</th>
    <th>Usuario(Atendente)</th>
    <th>Data de Abertura</th>
    <th>Data do Termino</th>
    <th>Descrição do Problema</th>
    <th>Descrição da Solução</th>
    <th>Status</th>
</thead>
<tbody>
    <?php foreach ($lista as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['usuario']; ?></td>
            <td><?php echo $item['data_abertura']; ?></td>
            <td><?php echo $item['data_termino']; ?></td>
            <td><?php echo $item['descricao_problema']; ?></td>
            <td><?php echo $item['descricao_solucao']; ?></td>
            <td><?php echo ($item['status']) ? "Aberto" : "Fechado"; ?></td>
            <td>
                <a href="index.php?manutencao=os&acao=buscar&id=<?php echo $item['id']; ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
            <td>
                <a href="index.php?manutencao=os&acao=excluir&id=<?php echo $item['id']; ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>

    <?php endforeach; ?>
</tbody>
</table>
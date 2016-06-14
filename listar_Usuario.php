
<center><h1>Lista dos Usuários Cadastrados</h1></center>

<a href="index.php?manutencao=usuario&acao=novo">
    <span class="glyphicon glyphicon-plus">Adicionar Usuário</span> 
</a>
<table class="table table-striped table-hover">
    <thead>
    <th>#</th>
    <th>Usuario</th>
    <th>Email</th>
    <th>Tipo</th>
    <th>Cidade</th>
    <th>Editar</th>
    <th>Excluir</th>
</thead>
<tbody>
    <?php foreach ($lista as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['usuario']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['idtipo']; ?></td>
            <td><?php echo $item['idcidade']; ?></td>
            <td>
                <a href="index.php?manutencao=usuario&acao=buscar&id=<?php echo $item['idusuario']; ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
            <td>
                <a href="index.php?manutencao=usuario&acao=excluir&id=<?php echo $item['idusuario']; ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>


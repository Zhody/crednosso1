<h1><?php echo $title_page; ?></h1>
<a href="<?php echo $base; ?>/contestation/add">[ADICIONAR]</a>
<a href="<?php echo $base; ?>/">[VOLTAR]</a>
<?php if($contestations !== null): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nº CONTESTAÇÃO</td>
                <td>NOME</td>
                <td>CARTAO</td>
                <td>DATA</td>
                <td>STATUS</td>
                <td>ATIVO</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contestations as $contestation): ?>
                <tr>
                    <td><?php echo $contestation['id']; ?></td>
                    <td><?php echo $contestation['num_contest_system']; ?></td>
                    <td><?php echo $contestation['name']; ?></td>
                    <td><?php echo $contestation['card']; ?></td>
                    <td><?php echo $contestation['date']; ?></td>
                    <td><?php echo $contestation['status']; ?></td>
                    <td><?php echo $contestation['active']; ?></td>
                    <td>
                        <a>[EDITAR]</a>
                        <?php if($contestation['active'] == 'Y'): ?>
                            <a href="<?php echo $base; ?>/contestation/disable/<?php echo $contestation['id']; ?>">[INATIVAR]</a>
                        <?php else: ?>
                            <a href="<?php echo $base; ?>/contestation/enable/<?php echo $contestation['id']; ?>">[ATIRAR]</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nada a mostrar!</p>
<?php endif; ?>
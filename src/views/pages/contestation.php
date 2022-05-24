<?php $render('header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $base; ?>./assets/css/styles.css">
<h1><?php echo $title_page; ?></h1>
<form class="formContest">
    <a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/contestation/add">ADICIONAR</a>
    <a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/">VOLTAR</a>
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
                            <a class="btn btn-secondary btn-sm btnInternal" href="<?php echo $base; ?>/contestation/edit/<?php echo $contestation['id']; ?>">EDITAR</a>
                            <?php if($contestation['active'] == 'Y'): ?>
                                <a class="btn btn-secondary btn-sm btnInternal" href="<?php echo $base; ?>/contestation/disable/<?php echo $contestation['id']; ?>">INATIVAR</a>
                            <?php else: ?>
                                <a class="btn btn-secondary btn-sm btnInternal" href="<?php echo $base; ?>/contestation/enable/<?php echo $contestation['id']; ?>">ATIRAR</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nada a mostrar!</p>
    <?php endif; ?>
</form>
<?php $render('footer'); ?>
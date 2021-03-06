<?php $render('header'); ?>
<h1><?php echo $title_page; ?></h1>
<form class="formContest">
<a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/shipping/add">ADICIONAR</a>
<a class="btn btn-secondary btn-sm btnMain" href="<?php echo $base; ?>/">VOLTAR</a>
<?php if(count($shippings) > 0): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>STATUS</td>
                <td>AÇOES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($shippings as $shipping): ?>
                <tr>
                    <td><?php echo $shipping['id_shipping']; ?></td>
                    <td><?php echo $shipping['name_shipping']; ?></td>
                    <td><?php echo $shipping['active']; ?></td>
                    <td>
                        <a class="btn btn-secondary btn-sm btnInternal" href="<?php echo $base; ?>/shipping/edit/<?php echo $shipping['id_shipping']; ?>" >EDITAR</a>
                        <?php if($shipping['active'] == 'Y'): ?>
                            <a class="btn btn-secondary btn-sm btnInternal"  href="<?php echo $base; ?>/shipping/disable/<?php echo $shipping['id_shipping']; ?>">INATIVAR</a>
                        <?php else: ?>
                            <a class="btn btn-secondary btn-sm btnInternal"  href="<?php echo $base; ?>/shipping/enable/<?php echo $shipping['id_shipping']; ?>">ATIVAR</a>
                        <?php endif; ?>
                        <a class="btn btn-secondary btn-sm btnInternal"  href="<?php echo $base; ?>/treasury/add/<?php echo $shipping['id_shipping']; ?>">SALDO</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nada a mostar</p>
<?php endif; ?>
</form>
<?php $render('footer'); ?>
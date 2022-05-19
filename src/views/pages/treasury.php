<?php $render('header'); ?>
<h1><?php echo $title_page; ?></h1>
<?php if($treasurys !== null): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>CASSETE A</td>
                <td>CASSETE B</td>
                <td>CASSETE C</td>
                <td>CASSETE D</td>
                <td>TOTAL</td>
                <td>STATUS</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($treasurys as $treasury): ?>
                <tr>
                    <td><?php echo $treasury['id_shipping']; ?></td>
                    <td><?php echo $treasury['name_shipping']; ?></td>
                    <td><?php echo $treasury['a_10']; ?></td>
                    <td><?php echo $treasury['b_20']; ?></td>
                    <td><?php echo $treasury['c_50']; ?></td>
                    <td><?php echo $treasury['d_100']; ?></td>
                    <td><?php echo 'R$ '.number_format($treasury['balance'], 2); ?></td>
                    <td><?php echo $treasury['status']; ?></td>
                    <td>
                        <a href="<?php echo $base; ?>/treasury/add/<?php echo $treasury['id_shipping']; ?>">[ATUALIZAR SALDO]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nada a mostrar!</p>
<?php endif; ?>

<?php $render('footer'); ?>
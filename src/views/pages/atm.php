<?php $render('header'); ?>
<h1><?php echo $title_page; ?></h1>
<?php if($atms !== null): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>NOME REDUZIDO</td>
                <td>TRANSPORTADORA</td>
                <td>CASSETE A</td>
                <td>CASSETE B</td>
                <td>CASSETE C</td>
                <td>CASSETE D</td>
                <td>STATUS</td>
                <td>AÇÃOES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($atms as $atm): ?>
                <tr>
                    <td><?php echo $atm['id_atm']; ?></td>
                    <td><?php echo $atm['name_atm']; ?></td>
                    <td><?php echo $atm['shortened_name_atm']; ?></td>
                    <td><?php echo $atm['name_shipping']; ?></td>
                    <td><?php echo $atm['cass_A']; ?></td>
                    <td><?php echo $atm['cass_B']; ?></td>
                    <td><?php echo $atm['cass_C']; ?></td>
                    <td><?php echo $atm['cass_D']; ?></td>
                    <td><?php echo $atm['status']; ?></td>
                    <td>
                        <a href="<?php echo $base; ?>/atm/edit/<?php echo $atm['id_atm']; ?>">[EDITAR]</a>
                        <a href="<?php echo $base; ?>/atm/enable/<?php echo $atm['id_atm']; ?>">[ATIVAR]</a>
                        <a href="<?php echo $base; ?>/atm/disable/<?php echo $atm['id_atm']; ?>">[INATIVAR]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nada a mostrar.</p>
<?php endif; ?>
<?php $render('footer'); ?>
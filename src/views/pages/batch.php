<?php $render('header');  ?>
<h1><?php echo $title_page; ?></h1>
<?php if($batchs !== null): ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>LOTE</td>
                <td>TIPO</td>
                <td>STATUS</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($batchs as $key => $batch): ?>
                <tr>
                    <td><?php echo $batch['id']; ?></td>
                    <td><?php echo $batch['batch']; ?></td>
                    <td><?php echo $batch['id_type']; ?></td>
                    <td><?php echo $batch['name_status']; ?></td>
                    <td>
                        <a>VISUALIZAR</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php ?>
<?php else: ?>
    <p>Nada a mostrar.</p>
<?php endif; ?>

<?php $render('footer'); ?>